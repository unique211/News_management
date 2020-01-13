<?php
class Transaction_model extends CI_Model
{

	function insertdata($table, $data)
	{
		$result = '';

		$result =	$this->db->insert($table, $data);
		 // $this->db->insert_id();

		return $result;
	}
	function updatedata($table, $data, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table, $data);
		return $result;
	}
	function delete_data($table, $id)
	{



	
			$data = array(
				'status' => 0,
			);
			$this->db->where('id', $id);
			$result = $this->db->update($table, $data);
			return $result;
		


		/* $this->db->where('id',$id);    
        $result = $this->db->delete($table);
        
        return $result;*/
	}
	function data_get($table)
	{
		
		$this->db->select('transaction_master.*,master_table.newspaper_name as newspaper_nm');
		$this->db->from('transaction_master');
		$this->db->join('master_table', 'master_table.id=transaction_master.newspaper_name');
		$this->db->where('transaction_master.status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function get_master_where($table_name, $id)
	{
		
			$this->db->select('*');
			$this->db->from('transaction_master');

			$this->db->where('transaction_master.status', 1);
			$this->db->where('transaction_master.id', $id);
			$query = $this->db->get();
			return $query->result();
		
	}
	function getdropdown($table)
	{
		//$hotel_id=$this->session->hotel_id;
		$this->db->select('*');
		$this->db->from($table);

		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function get_code($table, $id)
	{
		$this->db->select('code');
		$this->db->from($table);
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function get_newspaper($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('code', $id);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}
}
