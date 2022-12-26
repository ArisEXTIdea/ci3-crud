<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siuser extends MX_Controller {

	// RENDER

	public function index(){

		$usersData = $this->siuserm->get_all_data();
		$renderData = [
			'title' => 'SIUSER',
			'usersData' => $usersData
		];

		$this->theme->load('dashboard', $renderData);
	}

	public function render_form_add(){
		$renderData = [
			'title' => 'Tambah Data Baru'
		];

		$this->theme->load('form_add', $renderData);
	}

	public function render_detail(){
		$url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
		$uid = $url[0];

		$userData = $this->siuserm->get_user($uid);

		$renderData = [
			'title' => 'Tambah Data Baru',
			'userData' => get_object_vars($userData)
		];

		$this->theme->load('detail_akun', $renderData);
	}

	public function render_edit_akun(){
		$url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
		$uid = $url[0];

		$userData = $this->siuserm->get_user($uid);

		$renderData = [
			'title' => 'Edit Data Akun',
			'userData' => get_object_vars($userData)
		];

		$this->theme->load('form_edit', $renderData);
	}

	public function render_edit_akun_image(){
		$url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
		$uid = $url[0];

		$userData = $this->siuserm->get_user($uid);

		$renderData = [
			'title' => 'Edit Data Akun',
			'userData' => get_object_vars($userData)
		];

		$this->theme->load('form_edit_image', $renderData);
	}

	// FUNCTION

	public function save_data_user(){
		$config['upload_path']          = './assets/uploads';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['file_name']           = 'img-' . uniqid();

		$this->upload->initialize($config);
		
		$this->upload->do_upload('image');

		$dataToSave = [
			'uid' => 'uid-' . uniqid(),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'full_name' => $this->input->post('full_name'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'image' => $this->upload->data('file_name'),
		];
		
		
		if(!$this->siuserm->save_data($dataToSave)){
			$this->session->set_flashdata('alert-success', 'Data berhasil disimpan.');
		} else {
			$this->session->set_flashdata('alert-fail', 'Data gagal disimpan.');
		}

		$this->session->set_flashdata('alert', 'active');

		redirect('/tambah-akun');

	}

	public function edit_data_user(){
		$uid = $this->input->post('uid');
		
		$dataToSave = [
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'full_name' => $this->input->post('full_name'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
		];


		if(!$this->siuserm->edit_data_user($dataToSave, $uid)){
			$this->session->set_flashdata('alert-success', 'Data berhasil diupdate.');
		} else {
			$this->session->set_flashdata('alert-fail', 'Data gagal diupdate.');
		}

		$this->session->set_flashdata('alert', 'active');

		redirect('/detail-akun' . '/' . $uid);
	}

	public function edit_data_user_image(){
		$config['upload_path']          = './assets/uploads';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['file_name']           = 'img-' . uniqid();

		$this->upload->initialize($config);
		
		$this->upload->do_upload('image');

		$uid = $this->input->post('uid');
		
		$dataToSave = [
			'image' => $this->upload->data('file_name'),
		];

		
		if(!$this->siuserm->edit_data_user_image($dataToSave, $uid)){
			$this->session->set_flashdata('alert-success', 'Data berhasil diupdate.');
			unlink('./assets/uploads' . '/' . $this->input->post('oldimg'));
		} else {
			$this->session->set_flashdata('alert-fail', 'Data gagal diupdate.');
		}

		$this->session->set_flashdata('alert', 'active');

		redirect('/detail-akun' . '/' . $uid);
	}

	public function delete_user(){
		$url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
		$uid = $url[0];

		$userData = get_object_vars($this->siuserm->get_user($uid));

		if(!$this->siuserm->delete_data($uid)){
			$this->session->set_flashdata('alert-success', 'Data berhasil dihapus.');
			unlink('./assets/uploads' . '/' . $userData['image']);
		} else {
			$this->session->set_flashdata('alert-fail', 'Data gagal dihapus.');
		}

		$this->session->set_flashdata('alert', 'active');

		redirect('/');

	}
}
