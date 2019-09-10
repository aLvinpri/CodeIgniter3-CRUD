<?php

class Peoples extends CI_Controller
{
  // public function __construct()
  // {
  //   parent::__construct(); //aturan dari codeigniter jia ingin me load construct
  //   $this->load->model('Mahasiswa_model');
  //   $this->load->library('form_validation');

  //   // Cara meload modul session di controller
  //   // $this->load->library('session');

  //   // Cara meload modul base_url di controller
  //   // $this->load->helper('url');
  // }

  public function index()
  {
    $data['judul'] = 'List Of Peoples';
    // Load Model
    $this->load->model('Peoples_model', 'peoples');

    // PAGINATION
    $this->load->library('pagination');

    // Ambil data search keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    // // 1. Config Pagination didalam controller
    // $config['base_url'] = 'http://localhost:82/CI-CRUD/peoples/index';
    // $config['total_rows'] = $this->peoples->countAll('peoples');
    // $config['per_page'] = 8;
    // $config['num_links'] = 6;

    // // Styling links
    // $config['full_tag_open'] = '<nav aria-label="Page navigation"> <ul class="pagination justify-content-center">';
    // $config['full_tag_close'] = '</ul> </nav>';

    // $config['first_link'] = 'First';
    // $config['first_tag_open'] = '<li class="page-item">';
    // $config['first_tag_close'] = '</li>';

    // $config['last_link'] = 'Last';
    // $config['last_tag_open'] = '<li class="page-item">';
    // $config['last_tag_close'] = '</li>';

    // $config['prev_link'] = '&laquo';
    // $config['prev_tag_open'] = '<li class="page-item">';
    // $config['prev_tag_close'] = '</li>';

    // $config['next_link'] = '&raquo';
    // $config['next_tag_open'] = '<li class="page-item">';
    // $config['next_tag_close'] = '</li>';

    // $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#">';
    // $config['cur_tag_close'] = '</a></li>';

    // $config['num_tag_open'] = '<li class="page-item">';
    // $config['num_tag_close'] = '</li>';

    // $config['attributes'] = array('class' => 'page-link');

    // 2. Config Pagination dengan file terpisah
    //    a. Buat file pagination.php di dalam folder config
    //    b. Pindahkan semua config ke dalam file pagination.php, kecuali 2 config dibawah ini :
    //       $config['total_rows'] = $this->peoples->countAll('peoples');
    //       $config['per_page'] = 8;

    $this->db->like('name', $data['keyword']);
    $this->db->or_like('email', $data['keyword']);
    $this->db->from('peoples');
    $config['total_rows'] = $this->db->count_all_results(); // query untuk menghitung dari query sebelumnya
    $data['total_rows'] = $config['total_rows']; // mengirimkan data total_rows ke index
    $config['per_page'] = 8;

    // initialize
    $this->pagination->initialize($config);

    $data['start_page'] = $this->uri->segment(3);

    $data['peoples'] = $this->peoples->getAll('peoples', $config['per_page'], $data['start_page'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('peoples/index', $data);
    $this->load->view('templates/footer');
  }

  // public function tambah()
  // {
  //   $data['judul'] = 'Form Tambah Data Mahasiswa';

  //   $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama Harus di isi'));
  //   $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
  //   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

  //   if ($this->form_validation->run() == false) {
  //     $this->load->view('templates/header', $data);
  //     $this->load->view('mahasiswa/tambah');
  //     $this->load->view('templates/footer');
  //   } else {
  //     $this->Mahasiswa_model->tambahDataMahasiswa();
  //     $this->session->set_flashdata('flash', 'Ditambahkan');
  //     redirect('mahasiswa');
  //   }
  // }

  // public function hapus($id)
  // {
  //   $this->Mahasiswa_model->hapusDataMahasiswa($id);
  //   $this->session->set_flashdata('flash', 'Dihapus');
  //   redirect('mahasiswa');
  // }

  // public function detail($id)
  // {
  //   $data['judul'] = 'Detail Data Mahasiswa';
  //   $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
  //   $this->load->view('templates/header', $data);
  //   $this->load->view('mahasiswa/detail', $data);
  //   $this->load->view('templates/footer');
  // }

  // public function ubah($id)
  // {
  //   $data['judul'] = 'Form Ubah Data Mahasiswa';
  //   $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
  //   $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

  //   $this->form_validation->set_rules('nama', 'Nama', 'required');
  //   $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
  //   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

  //   if ($this->form_validation->run() == false) {
  //     $this->load->view('templates/header', $data);
  //     $this->load->view('mahasiswa/ubah', $data);
  //     $this->load->view('templates/footer');
  //   } else {
  //     $this->Mahasiswa_model->ubahDataMahasiswa();
  //     $this->session->set_flashdata('flash', 'Diubah');
  //     redirect('mahasiswa');
  //   }
  // }
}
