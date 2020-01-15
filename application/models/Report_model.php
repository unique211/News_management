<?php
class Report_model extends CI_Model
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
		
		$this->db->select('*');
		$this->db->from('master_table');

		$this->db->where('master_table.status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function generate_report($from,$to,$type,$impact,$newspaper)
	{
		
		$this->db->select('transaction_master.*,master_table.newspaper_name as newspaper_nm');
			$this->db->from('transaction_master');
			$this->db->join('master_table', 'master_table.id=transaction_master.newspaper_name');
			$this->db->where('transaction_master.status', 1);
			if($type>0){
				$this->db->where('transaction_master.type', $type);
			}
			if($impact>0){
				$this->db->where('transaction_master.impact_of_news', $impact);
			}
			if($newspaper>0){
				$this->db->where('transaction_master.newspaper_name', $newspaper);
			}

			$this->db->where('transaction_master.date >=', $from);
			$this->db->where('transaction_master.date <=', $to);
			
			$query = $this->db->get();
			return $query->result();
		
	}
}
