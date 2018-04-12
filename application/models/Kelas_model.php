<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Kelas_model extends CI_Model {
		function create($data){
			//Bentuk Umum: $this->db->insert("nama_table", $data);
			$this->db->insert("t_kelas", $data);
		}
		
		function read($where="", $order=""){
			if (!empty($where)) $this->db->where($where);
			if (!empty($order)) $this->db->where($order);
			
			$query = $this->db->get("t_kelas");
			if ($query and $query->num_rows() !=0){
				return $query->result();
			} else {
				return array();
			}
		}
		
		function update($where, $data){
			$this->db->where($where);
			$this->db->update("t_kelas", $data);
		}
		
		function delete($where){
			$this->db->where($where);
			$this->db->delete("t_kelas");
		}
	}
?>