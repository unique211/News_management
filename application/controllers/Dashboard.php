<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }




    public function get_count()
    { 
		
       
        $data1=$this->Dashboard_model->get_count();
    	echo json_encode($data1);
	}
	
	public function generate_report(){
	
        
		$data=$this->Dashboard_model->generate_report();			
		echo json_encode($data);	
	}
    public function get_master(){
	
		$table_name	=$this->input->post('table_name');//"account_group"; //
		$data=$this->Report_model->data_get($table_name);			
		echo json_encode($data);	
    }
  
	
}
