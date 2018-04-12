<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Siswa_model extends CI_Model {
		function create($data){
			//Bentuk Umum: $this->db->insert("nama_table", $data);
			$this->db->insert("t_siswa", $data);
		}
		
		function read($where="", $order=""){
			if (!empty($where)) $this->db->where($where);
			if (!empty($order)) $this->db->where($order);
			
			$this->db->join("t_kelas", "t_kelas.id_kelas=t_siswa.id_kelas");
			
			$query = $this->db->get("t_siswa");
			if ($query and $query->num_rows() !=0){
				return $query->result();
			} else {
				return array();
			}
		}
		
		function update($where, $data){
			$this->db->where($where);
			$this->db->update("t_siswa", $data);
		}
		
		function delete($where){
			$this->db->where($where);
			$this->db->delete("t_siswa");
		}
	}
?>