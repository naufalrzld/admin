<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Siswa extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			//Cek apakah ada session username
			$username = $this->session->userdata('username');
			
			//Jika tidak ada atau kosong, arahkan ke halaman login
			if(empty($username)) redirect("login");
		}
		
		function index(){
			$this->load->model("siswa_model");
			$data['result'] = $this->siswa_model->read();
			
			$data['level'] = $this->session->userdata('level');
			
			$data['view'] = "siswa/v_list";
			$this->load->view("index", $data);
		}
		
		function tambah(){
			$this->load->model("kelas_model");
			$kelas = array();
			$kelas[""] = "[ Pilih Kelas ]";
			
			$dataKelas = $this->kelas_model->read();
			foreach($dataKelas as $row) {
				$kelas[$row->id_kelas] = $row->nama_kelas;
			}
			$data['kelas'] = $kelas;
			
			$data['view'] = "siswa/v_form";
			$this->load->view("index", $data);
		}
		
		function do_tambah(){
			$post = $this->input->post(NULL, TRUE);
			$this->load->model("siswa_model");
			$this->siswa_model->create($post);
			
			//Mengarahkan ke satu halaman
			redirect("siswa");
		}
		
		function edit($id){
			$this->load->model("kelas_model");
			$kelas = array();
			$kelas[""] = "[ Pilih Kelas ]";
			
			$dataKelas = $this->kelas_model->read();
			foreach($dataKelas as $row) {
				$kelas[$row->id_kelas] = $row->nama_kelas;
			}
			$data['kelas'] = $kelas;
			
			$this->load->model("siswa_model");
			
			//Mengambil data berdasarkan id (WHERE id = xxx)
			$result = $this->siswa_model->read("nis = '$id'");
			
			//Mengambil data result array pertama
			//karena data dipastikan hanya 1 row
			$data['result'] = $result[0];
			
			$data['form_edit'] = TRUE;
			$data['view'] = "siswa/v_form";
			$this->load->view("index", $data);
		}
		
		function do_edit($id){
			$post = $this->input->post(NULL, TRUE);
			$this->load->model("siswa_model");
			$this->siswa_model->update("id_siswa = '$id'", $post);
			
			redirect("siswa");
		}
		
		function delete($id){
			$this->load->model("siswa_model");
			$this->siswa_model->delete("id_siswa = '$id'");
			
			redirect("siswa");
		}
	}
?>