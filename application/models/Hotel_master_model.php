<?php
class Hotel_master_model extends CI_Model
{

	function insertdata($table, $data)
	{
		$result = '';

		$this->db->insert($table, $data);
		$result =  $this->db->insert_id();

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



		if ($table == "hotel_master") {
			$data = array(
				'status' => 0,
			);
			$this->db->where('id', $id);
			$result = $this->db->update($table, $data);

			$this->db->where('ref_id', $id);
			$this->db->where('role', 'Admin');
			$this->db->delete('login_master');

			return $result;
		} else {
			$data = array(
				'status' => 0,
			);
			$this->db->where('id', $id);
			$result = $this->db->update($table, $data);
			return $result;
		}


		/* $this->db->where('id',$id);    
        $result = $this->db->delete($table);
        
        return $result;*/
	}
	function data_get($table)
	{

		$this->db->select('*');
		$this->db->from('hotel_master');

		$this->db->where('hotel_master.status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function get_master_where($table_name, $id)
	{
		if ($table_name == "login_master") {
			$this->db->select('*');
			$this->db->from('login_master');

			$this->db->where('login_master.status', 1);
			$this->db->where('ref_id', $id);
			$this->db->where('role', 'Admin');
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->select('*');
			$this->db->from('hotel_master');

			$this->db->where('hotel_master.status', 1);
			$this->db->where('hotel_master.id', $id);
			$query = $this->db->get();
			return $query->result();
		}
	}
}
