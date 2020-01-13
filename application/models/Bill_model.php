<?php
class Bill_model extends CI_Model
{

	function insertdata($table, $data)
	{
		$ref_id = '';

			$this->db->insert($table, $data);
			$ref_id = $this->db->insert_id();

		


		return $ref_id;
	}
	function insertdata2($table, $data)
	{
		$result = '';

		$result =	$this->db->insert($table, $data);
		//	 $this->db->insert_id();

		return $result;
	}
	function updatedata($table, $data, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table, $data);
		return $result;
	}
	function delete_bill_details($id)
	{
			
		$this->db->where('bill_ref_id',$id);    
        $result = $this->db->delete('bill_details');
		return $result;
	}

	function delete_data($table, $id)
	{



	
			$data = array(
				'status' => 0,
			);
			$this->db->where('id', $id);
			$result = $this->db->update($table, $data);

			$this->db->where('bill_ref_id',$id);    
      $this->db->delete('bill_details');
			return $result;
		


		/* $this->db->where('id',$id);    
        $result = $this->db->delete($table);
        
        return $result;*/
	}
	function data_get($table)
	{
		$hotel_id=$this->session->hotel_id;
		$this->db->select('bill_master.*,emp_master.emp_name,table_master.table_name');
		$this->db->from('bill_master');
		$this->db->join('emp_master', 'emp_master.id=bill_master.emp_id');
		$this->db->join('table_master', 'table_master.id=bill_master.table_id');
		$this->db->where('bill_master.status', 1);
		$this->db->where('bill_master.hotel_id', $hotel_id);
		$query = $this->db->get();
		return $query->result();
	}
	function get_hotel_data()
	{
		$hotel_id=$this->session->hotel_id;
		$this->db->select('*');
		$this->db->from('hotel_master');
		$this->db->where('hotel_master.id', $hotel_id);
		$query = $this->db->get();
		return $query->result();
	}
	function get_master_where($table_name, $id)
	{
		
			$this->db->select('bill_master.*,emp_master.emp_name,table_master.table_name');
			$this->db->from('bill_master');
			$this->db->join('emp_master', 'emp_master.id=bill_master.emp_id');
			$this->db->join('table_master', 'table_master.id=bill_master.table_id');
			$this->db->where('bill_master.status', 1);
			$this->db->where('bill_master.id', $id);
			$query = $this->db->get();
			return $query->result();
		
	}
	function get_master_where1($table_name, $id)
	{
		
			$this->db->select('bill_details.*,item_master.curse');
			$this->db->from('bill_details');
			$this->db->join('item_master', 'item_master.id=bill_details.item_id');
			$this->db->where('bill_details.bill_ref_id', $id);
			$query = $this->db->get();
			return $query->result();
		
	}
	function getdropdown($table)
	{
		$hotel_id=$this->session->hotel_id;
		$this->db->select('*');
		$this->db->from($table);

		$this->db->where('status', 1);
		$this->db->where('hotel_id', $hotel_id);
		$query = $this->db->get();
		return $query->result();
	}
	function get_rate($item)
	{
		$hotel_id=$this->session->hotel_id;
		$this->db->select('*');
		$this->db->from('item_master');

		$this->db->where('id', $item);
			$query = $this->db->get();
		return $query->result();
	}
}
