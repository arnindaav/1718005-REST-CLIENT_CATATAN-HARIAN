<?php

class CatatanHarian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CatatanHarian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Catatan Harian';
        $data['catatan_harian'] = $this->CatatanHarian_model->getAllCatatanHarian();
        if( $this->input->post('keyword') ) {
            $data['catatan_harian'] = $this->CatatanHarian_model->cariCatatanHarian();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('catatanharian/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Catatan Harian';
        $this->form_validation->set_rules('ketegori', 'kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('catatanharian/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->CatatanHarian_model->tambahCatatanHarian();
            $this->session->set_flashdata('success', 'Ditambahkan');
            redirect('CatatanHarian');
        }
    }

    public function hapus($id)
    {
        $this->CatatanHarian_model->hapusCatatanHarian($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('catatanharian');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Catatan Harian';
        $data['catatan_harian'] = $this->CatatanHarian_model->getCatatanHarianById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('catatanharian/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Catatan Harian';
        $data['catatan_harian'] = $this->CatatanHarian_model->getCatatanHarianById($id);
        $data['kategori'] = ['Belanja', 'Keuangan', 'Jadwal'];

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('catatanharian/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->CatatanHarian_model->ubahCatatanHarian();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('CatatanHarian');
        }
    }

}
