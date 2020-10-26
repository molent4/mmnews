<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class videoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('form_validation');
        $this->load->model('KategoriBerita');
        $this->load->model('BeritaVideo');
        if ($this->session->role_id != 1) {
            redirect('landingpage');
        }
    }

    public function index()
    {
        $data['title'] = "Berita Video";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->BeritaVideo->getAllData();
        $this->template->load('template', 'berita_video/index', $data);
    }

    public function create()
    {
        $data['title'] = "Berita Video";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->KategoriBerita->getAll();
        $this->template->load('template', 'berita_video/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Berita Video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataBerita'] = $this->BeritaVideo->getDataById($id);
        $data['kategori'] = $this->KategoriBerita->getAll();
        $this->template->load('template', 'berita_video/edit', $data);
    }

    public function store_video()
    {
        $this->form_validation->set_rules('nama_berita', 'Judul Berita', 'required|trim', [
            'required' => 'Judul Berita harus diisi!'
        ]);

        if (empty($_FILES['video']['name'])) {
            $this->form_validation->set_rules('video', 'Video', 'required|trim', [
                'required' => 'Video harus diisi!'
            ]);
        }


        $this->form_validation->set_rules('konten_berita', 'Konten Berita', 'required|trim', [
            'required' => 'Konten Berita harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Berita Video';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->template->load('template', 'berita_video/create', $data);
        } else {
            $date = date("ymd");
            $video_name = $date . '_' . $_FILES['video']['name'];
            $config['upload_path'] = './assets/public/video/input';
            $config['max_size'] = '200000';
            $config['allowed_types'] = 'avi|flv|wmv|mp4';
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['file_name'] = $video_name;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('video')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="callout callout-danger" style="margin:0 8px;">
			<h4>Perhatian!</h4>
			<p>' . $error['error'] . '</p>
          </div>');
                redirect('berita/video/create');
            } else {
                if (chdir("binaries")) {
                    //$input_dir = dirname(__FILE__) . "/video/input/";
                    //$output_dir = dirname(__FILE__) . "/video/output/";
                    $input_dir = "C:/xampp/htdocs/infodewata/assets/public/video/input/";
                    $output_dir = "C:/xampp/htdocs/infodewata/assets/public/video/output/";
                    $video_file = $input_dir . $video_name;
                    $output = $output_dir . $video_name;
                    $process = exec("ffmpeg -i $video_file -c:v libx264 -crf 35 $output", $result);
                    unlink($video_file);
                    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    $this->BeritaVideo->insertData($video_name, $user['id_user']);
                    $this->session->set_flashdata('message', '<div class="callout callout-success" style="margin:0 8px 8px;">
                    <h4>Selamat!</h4>
                    <p> Berita Video berhasil dibuat!</p>
                  </div>');
                    redirect('berita/video/create');
                } else {
                    $this->session->set_flashdata('message', '<div class="callout callout-danger" style="margin:0 8px;">
                    <h4>Perhatian!</h4>
                    <p> Video gagal terkompresi!</p>
                  </div>');
                    redirect('berita/video/create');
                }
            }
        }
    }

    public function update($id_berita)
    {
        $data['title'] = 'Berita Video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->KategoriBerita->getAll();
        $data['dataBerita'] = $this->BeritaVideo->getDataById($id_berita);

        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim', [
            'required' => 'Judul Berita harus diisi!'
        ]);

        $this->form_validation->set_rules('konten_berita', 'Konten Berita', 'required|trim', [
            'required' => 'Konten Berita harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'berita_video/edit', $data);
        } else {
            if (empty($_FILES['video']['name'])) {
                $filename = $data['dataBerita']['nama_video'];
                $this->BeritaVideo->updateData($id_berita, $filename);
                $this->session->set_flashdata('message', '<div class="callout callout-success" style="margin:0 8px 8px;">
                <h4>Selamat!</h4>
                <p> Data berhasil diperbaharui!</p>
              </div>');
                redirect('berita/video/edit/' . $id_berita);
            } else {
                $date = date("ymd");
                $filename = $date . '_' . $_FILES['video']['name'];
                $config['upload_path'] = './assets/public/video/input';
                $config['max_size'] = '200000';
                $config['allowed_types'] = 'avi|flv|wmv|mp4';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $filename;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('video')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="callout callout-danger" style="margin:0 8px;">
			<h4>Perhatian!</h4>
			<p>' . $error['error'] . '</p>
          </div>');
                    redirect('berita/video/edit/' . $id_berita);
                }
                else{
                    if (chdir("binaries")) {
                        //$input_dir = dirname(__FILE__) . "/video/input/";
                        //$output_dir = dirname(__FILE__) . "/video/output/";
                        $input_dir = "C:/xampp/htdocs/infodewata/assets/public/video/input/";
                        $output_dir = "C:/xampp/htdocs/infodewata/assets/public/video/output/";
                        $video_file = $input_dir . $filename;
                        $output = $output_dir . $filename;
                        $process = exec("ffmpeg -i $video_file -c:v libx264 -crf 35 $output", $result);
                        unlink($video_file);
            
                        $this->BeritaVideo->updateData($id_berita,$filename);
                        $this->session->set_flashdata('message', '<div class="callout callout-success" style="margin:0 8px 8px;">
                        <h4>Selamat!</h4>
                        <p> Data berhasil diperbaharui!</p>
                      </div>');
                        redirect('berita/video/edit/' . $id_berita);
                    }
                }
            }
        }
    }

    public function delete()
    {
        $result = $this->BeritaVideo->delete($this->input->post('id_berita'));
        echo json_encode($result);
    }
}
