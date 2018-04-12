<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Kelas extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			//Cek apakah ada session username
			$username = $this->session->userdata('username');
			
			//Jika tidak ada atau kosong, arahkan ke halaman login
			if(empty($username)) redirect("login");
		}
		
		function index(){
			$this->load->model("kelas_model");
			$data['result'] = $this->kelas_model->read();
			
			$data['level'] = $this->session->userdata('level');
			
			$data['view'] = "kelas/v_list";
			$this->load->view("index", $data);
		}
		
		function tambah(){
			$data['view'] = "kelas/v_form";
			$this->load->view("index", $data);
		}
		
		function do_tambah(){
			$post = $this->input->post(NULL, TRUE);
			$this->load->model("kelas_model");
			$this->kelas_model->create($post);
			
			//Mengarahkan ke satu halaman
			redirect("kelas");
		}
		
		function edit($id){
			$this->load->model("kelas_model");
			
			//Mengambil data berdasarkan id (WHERE id = xxx)
			$result = $this->kelas_model->read("id_kelas = '$id'");
			
			//Mengambil data result array pertama
			//karena data dipastikan hanya 1 row
			$data['result'] = $result[0];
			
			$data['form_edit'] = TRUE;
			$data['view'] = "kelas/v_form";
			$this->load->view("index", $data);
		}
		
		function do_edit($id){
			$post = $this->input->post(NULL, TRUE);
			$this->load->model("kelas_model");
			$this->kelas_model->update("id_kelas = '$id'", $post);
			
			redirect("kelas");
		}
		
		function delete($id){
			$this->load->model("kelas_model");
			$this->kelas_model->delete("id_kelas = '$id'");
			
			redirect("kelas");
		}
	}
?>