<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
	}


	public function login_kah()
	{
		if ($this->session->has_userdata('username') && $this->session->userdata('name'))
			return TRUE;
		else
			redirect(base_url('logout'));
	}


	public function index()
	{
		$data['judul']	= 'Selamat Datang di SiSurat';
		$data['page']	= 'home';

		$data['jml_surat_masuk'] = $this->m_umum->jumlah_record_tabel('surat_masuk');
		$data['jml_surat_keluar'] = $this->m_umum->jumlah_record_tabel('surat_keluar');

		$this->tampil($data);
	}

	// =======================Surat Masuk =====================
	public function surat_masuk()
	{
		$data['judul'] = 'Data Surat Masuk';
		$data['page'] = 'surat_masuk';
		$data['surat_masuk'] = $this->m_admin->dt_surat_masuk();
		$this->tampil($data);
	}

	public function surat_masuk_tambah()
	{
		$data['judul'] = 'Tambah Surat Masuk';
		$data['page'] = 'surat_masuk_tambah';

		$this->form_validation->set_rules(
			'no_surat',
			'Nomor Surat',
			'required',
			array('required' => 'No Surat harus diisi.')
		);
		$this->form_validation->set_rules('pengirim', 'Isikan Nama Pengirim', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu Harus Diisi !', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran Harus Diisi !', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal Harus Diisi !', 'required');
		$this->form_validation->set_rules('penerima', 'Isikan Nama Penerima', 'required');
		$this->form_validation->set_rules('isi', 'Isi Surat Harus Diisi !', 'required');
		$this->form_validation->set_rules('unit_penerbit', 'Pilih Unit Penerbit', 'callback_dd_cek');
		$this->form_validation->set_rules('tempat', 'Tempat Harus Diisi !', 'required');
		$this->form_validation->set_rules('nama_pengesah', 'Pilih Nama Pengesah !', 'required');
		$this->form_validation->set_rules('nama_tembusan', 'Isi Surat Harus Diisi !', 'required');

		$data['unit_penerbit'] = $this->m_admin->dropdown_unit_penerbit();
		$data['nama_pengesah'] = $this->m_admin->dropdown_nama_pengesah();

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_surat_masuk_tambah();
			redirect(base_url('admin/surat_masuk'));
		}
	}

	public function surat_masuk_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Surat Masuk';
		$data['page'] = 'surat_masuk_edit';

		$this->form_validation->set_rules(
			'no_surat',
			'Nomor Surat',
			'required',
			array('required' => 'Nomor Surat Harus Diisi.')
		);
		$this->form_validation->set_rules('pengirim', 'Isikan Nama Pengirim', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu Harus Diisi !', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran Harus Diisi !', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal Harus Diisi !', 'required');
		$this->form_validation->set_rules('penerima', 'Isikan Nama Penerima', 'required');
		$this->form_validation->set_rules('isi', 'Isi Surat Harus Diisi !', 'required');
		$this->form_validation->set_rules('unit_penerbit', 'Pilih Unit Penerbit', 'callback_dd_cek');
		$this->form_validation->set_rules('tempat', 'Tempat Harus Diisi !', 'required');
		$this->form_validation->set_rules('nama_pengesah', 'Pilih Nama Pengesah !', 'required');
		$this->form_validation->set_rules('nama_tembusan', 'Isi Surat Harus Diisi !', 'required');

		$data['unit_penerbit'] = $this->m_admin->dropdown_unit_penerbit();
		$data['nama_pengesah'] = $this->m_admin->dropdown_nama_pengesah();
		$data['d'] = $this->m_umum->cari_data('surat_masuk', 'id', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_surat_masuk_edit($id);
			redirect(base_url('admin/surat_masuk'));
		}
	}

	public function surat_masuk_hapus($id)
	{
		$this->m_umum->hapus_data('surat_masuk', 'id', $id);
		redirect(base_url('admin/surat_masuk'));
	}

	// =======================Surat Keluar =====================
	public function surat_keluar()
	{
		$data['judul'] = 'Data Surat Keluar';
		$data['page'] = 'surat_keluar';
		$data['surat_keluar'] = $this->m_admin->dt_surat_keluar();
		$this->tampil($data);
	}

	public function surat_keluar_tambah()
	{
		$data['judul'] = 'Tambah Surat Keluar';
		$data['page'] = 'surat_keluar_tambah';

		$this->form_validation->set_rules(
			'no_surat',
			'Nomor Surat',
			'required',
			array('required' => 'No Surat harus diisi.')
		);
		$this->form_validation->set_rules('pengirim', 'Isikan Nama Pengirim', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu Harus Diisi !', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran Harus Diisi !', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal Harus Diisi !', 'required');
		$this->form_validation->set_rules('penerima', 'Isikan Nama Penerima', 'required');
		$this->form_validation->set_rules('isi', 'Isi Surat Harus Diisi !', 'required');
		$this->form_validation->set_rules('unit_penerbit', 'Pilih Unit Penerbit', 'callback_dd_cek');
		$this->form_validation->set_rules('tempat', 'Tempat Harus Diisi !', 'required');
		$this->form_validation->set_rules('nama_pengesah', 'Pilih Nama Pengesah !', 'required');
		$this->form_validation->set_rules('nama_tembusan', 'Isi Surat Harus Diisi !', 'required');

		$data['unit_penerbit'] = $this->m_admin->dropdown_unit_penerbit();
		$data['nama_pengesah'] = $this->m_admin->dropdown_nama_pengesah();

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_surat_keluar_tambah();
			redirect(base_url('admin/surat_keluar'));
		}
	}

	public function surat_keluar_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Surat Keluar';
		$data['page'] = 'surat_keluar_edit';

		$this->form_validation->set_rules(
			'no_surat',
			'Nomor Surat',
			'required',
			array('required' => 'Nomor Surat Harus Diisi.')
		);
		$this->form_validation->set_rules('pengirim', 'Isikan Nama Pengirim', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu Harus Diisi !', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran Harus Diisi !', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal Harus Diisi !', 'required');
		$this->form_validation->set_rules('penerima', 'Isikan Nama Penerima', 'required');
		$this->form_validation->set_rules('isi', 'Isi Surat Harus Diisi !', 'required');
		$this->form_validation->set_rules('unit_penerbit', 'Pilih Unit Penerbit', 'callback_dd_cek');
		$this->form_validation->set_rules('tempat', 'Tempat Harus Diisi !', 'required');
		$this->form_validation->set_rules('nama_pengesah', 'Pilih Nama Pengesah !', 'required');
		$this->form_validation->set_rules('nama_tembusan', 'Isi Surat Harus Diisi !', 'required');

		$data['unit_penerbit'] = $this->m_admin->dropdown_unit_penerbit();
		$data['nama_pengesah'] = $this->m_admin->dropdown_nama_pengesah();
		$data['d'] = $this->m_umum->cari_data('surat_keluar', 'id', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_surat_keluar_edit($id);
			redirect(base_url('admin/surat_keluar'));
		}
	}

	public function surat_keluar_hapus($id)
	{
		$this->m_umum->hapus_data('surat_keluar', 'id', $id);
		redirect(base_url('admin/surat_keluar'));
	}

	//============ Tools ===============
	function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
	{
		if ($str == '-Pilih-') {
			$this->form_validation->set_message('dd_cek', 'Harus dipilih');
			return FALSE;
		} else
			return TRUE;
	}

	function tampil($data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view('admin/isi');
		$this->load->view('admin/footer');
	}
}
