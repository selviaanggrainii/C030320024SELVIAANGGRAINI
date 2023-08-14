<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}

	public function index()
	{
		// hitung jumlah artikel
		$data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
		// hitung jumlah kategori
		$data['jumlah_kategori'] = $this->m_data->get_data('dbsuratmasuk_selvia')->num_rows();
		// hitung jumlah pengguna
		$data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
		// hitung jumlah halaman
		$data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_index',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
	}

	public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password Baru','required|matches[password_baru]');

		// cek validasi
		if($this->form_validation->run() != false){

			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// cek kesesuaikan password lama
			if($cek > 0){

				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');

				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_ganti_password');
			$this->load->view('dashboard/v_footer');
		}

	}

	// CRUD KATEGORI
	public function dbsuratmasuk_selvia()
	{
		$data['dbsuratmasuk_selvia'] = $this->m_data->get_data('dbsuratmasuk_selvia')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_aksi()
	{
		$this->form_validation->set_rules('dbsuratmasuk_selvia','Tambah Data','required');

		if($this->form_validation->run() != false){

			$dbsuratmasuk_selvia = $this->input->post('dbsuratmasuk_selvia');
			// 'no_surat' = $this->input->post('no_surat');
			// 'nama_pengirim' = $this->input->post('nama_pengirim');
			// $waktu = $this->input->post('waktu');
			// $tempat = $this->input->post('tempat');
			// $lampiran = $this->input->post('lampiran');
			// $perihal = $this->input->post('perihal');

			$data = array(
				'no_surat' => $dbsuratmasuk_selvia,
				'nama_pengirim' => $dbsuratmasuk_selvia,
				'waktu' => $dbsuratmasuk_selvia,
				'tempat' => $dbsuratmasuk_selvia,
				'lampiran' => $dbsuratmasuk_selvia,
				'perihal' => $dbsuratmasuk_selvia,
			);

			$this->m_data->insert_data($data, 'dbsuratmasuk_selvia');

			redirect(base_url().'dashboard/dbsuratmasuk_selvia');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function kategori_edit($id)
	{
		$where = array(
			'id_surat' => $id
		);
		$data['dbsuratmasuk_selvia'] = $this->m_data->edit_data($where,'dbsuratmasuk_selvia')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_update()
	{
		$this->form_validation->set_rules('dbsuratmasuk_selvia','dbsuratmasuk_selvia','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$dbsuratmasuk_selvia = $this->input->post('dbsuratmasuk_selvia');
			// $no_surat = $this->input->post('no_surat');
			// $nama_pengirim = $this->input->post('nama_pengirim');

			$where = array(
				'id_surat' => $id
			);

			$data = array(
				'no_surat' => $dbsuratmasuk_selvia,
				// 'nama_pengirim' => $nama_pengirim,
				// 'waktu' => $waktu,
				// 'tempat' => $dbsuratmasuk_selvia,
				// 'lampiran' => $dbsuratmasuk_selvia,
				// 'perihal' => $dbsuratmasuk_selvia,
			);

			$this->m_data->update_data($where, $data,'dbsuratmasuk_selvia');

			redirect(base_url().'dashboard/dbsuratmasuk_selvia');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'id_surat' => $id
			);
			$data['dbsuratmasuk_selvia'] = $this->m_data->edit_data($where,'dbsuratmasuk_selvia')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function kategori_hapus($id)
	{
		$where = array(
			'id_surat' => $id
		);

		$this->m_data->delete_data($where,'dbsuratmasuk_selvia');

		redirect(base_url().'dashboard/dbsuratmasuk_selvia');
	}
	// END CRUD KATEGORI


	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = array(
			'pengguna_id' => $id_pengguna
		);

		$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		
		if($this->form_validation->run() != false){

			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			
			$where = array(
				'pengguna_id' => $id
			);

			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email
			);

			$this->m_data->update_data($where,$data,'pengguna');

			redirect(base_url().'dashboard/profil/?alert=sukses');
		}else{
			// id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');

			$where = array(
				'pengguna_id' => $id_pengguna
			);

			$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	
}
