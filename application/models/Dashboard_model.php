<?php

class Dashboard_model extends CI_Model{
	function get_count()
	{
		$data=array();
		
		$this->db->select("count(*) as cnt");
		$this->db->from('master_table');
		$this->db->where('master_table.status', 1);
		$query1 = $this->db->get();
		foreach ($query1->result() as $row)  
        {  
            $data['all_news'] = $row->cnt;
		} 

		$this->db->select("count(*) as cnt");
		$this->db->from('master_table');
		$this->db->where('master_table.status', 1);
		$this->db->where("DATE(created_at) = CURRENT_DATE()");
		$query2 = $this->db->get();
		foreach ($query2->result() as $row)  
        {  
            $data['today_news'] = $row->cnt;
		} 

		$this->db->select("count(*) as cnt");
		$this->db->from('transaction_master');
		$this->db->where('transaction_master.status', 1);
		$query3 = $this->db->get();
		foreach ($query3->result() as $row)  
        {  
            $data['all_transaction'] = $row->cnt;
		} 

		$this->db->select("count(*) as cnt");
		$this->db->from('transaction_master');
		$this->db->where('transaction_master.status', 1);
		$this->db->where("DATE(created_at) = CURRENT_DATE()");
		$query4 = $this->db->get();
		foreach ($query4->result() as $row)  
        {  
            $data['today_transaction'] = $row->cnt;
		} 
		 
		return $data;
	}
	function generate_report()
	{
		
		$this->db->select('transaction_master.*,master_table.newspaper_name as newspaper_nm');
			$this->db->from('transaction_master');
			$this->db->join('master_table', 'master_table.id=transaction_master.newspaper_name');
			$this->db->where('transaction_master.status', 1);
			$this->db->order_by('transaction_master.id', 'DESC');
			$this->db->limit('10');	
			$query = $this->db->get();
			return $query->result();
		
	}



}
    
?>
