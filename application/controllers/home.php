<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller{
		//Constructor
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
			$this->load->view("index",$data);
		}
	}
?>