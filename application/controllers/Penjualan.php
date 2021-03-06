<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->Model('Model_penjualan');
    }

    public function index()
    {
        $kode_kategori = $this->input->post('kode_kategori');
        $data['kategori'] = $this->Model_penjualan->kategori_barang();
        $data['barang'] = $this->Model_penjualan->view_barang($kode_kategori);
        $this->template->load('template/template', 'penjualan/view_penjualan', $data);
    }

    public function view_barang()
    {
        $kode_kategori = $this->input->post('kode_kategori');
        $data['kategori'] = $this->Model_penjualan->kategori_barang();
        $data['barang'] = $this->Model_penjualan->view_barang($kode_kategori);
        $this->load->view('penjualan/view_barang', $data);
    }

    public function view_penjualan_temp()
    {
        $data['data'] = $this->Model_penjualan->view_penjualan_temp();
        $this->load->view('penjualan/view_penjualan_temp', $data);
    }

    public function input_temp()
    {
         $this->Model_penjualan->insert_temp();
    }

    public function hapus_temp()
    {
         $this->Model_penjualan->hapus_temp();
    }
}
