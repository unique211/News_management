<?php
class Item_master_model extends CI_Model
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
		$hotel_id=$this->session->hotel_id;
		$this->db->select('*');
		$this->db->from('item_master');

		$this->db->where('item_master.status', 1);
		$this->db->where('item_master.hotel_id', $hotel_id);
		$query = $this->db->get();
		return $query->result();
	}
	function get_master_where($table_name, $id)
	{
		
			$this->db->select('*');
			$this->db->from('item_master');

			$this->db->where('item_master.status', 1);
			$this->db->where('item_master.id', $id);
			$query = $this->db->get();
			return $query->result();
		
	}
}
