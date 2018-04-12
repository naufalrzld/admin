<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		function index() {
			//Ambil Feedback success dan error
			$data['success'] = $this->session->flashdata("success");
			$data['error'] = $this->session->flashdata("error");
			
			$this->load->view("v_login", $data);
		}
		
		function do_login() {
			//Ambil POST dengan nama username dan password
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			//Ambil data berdasarkan WHERE username = 'xxx' AND password = md5('xxx')
			$where = array(
				"username" => $username,
				"password" => md5($password)
			);
			
			$this->load->model("login_model");
			$result = $this->login_model->read($where);
			
			//Jika data ditemukan (jumlah data tidak sama dengan nol)
			if (count($result) != 0) {
				//Login Berhasil
				//Set Session untuk user yang login
				//Set session menggunakan sintax dibawah ini
				//$this->session->set_userdata("nama_session", "value")
				$this->session->set_userdata("username", $username);
				
				$level = $result[0]->level;
				$this->session->set_userdata("level", $level);
				
				//Kalau login berhasil, arahkan ke Controller Home
				redirect("home");
			} else {
				//Feedback, informasi bahwa login gagal karena username/password salah
				$this->session->set_flashdata("error", "Username atau Password salah");
				
				//Kalau login gagal, arahkan ke Controller Login
				redirect("login");
			}
		}
		
		function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
	}
?>