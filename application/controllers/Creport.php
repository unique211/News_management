<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Creport extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
    }



	public function adddata(){ 
        $table_name = $this->input->post('table_name');
        $id=$this->input->post('id');
        $data1="";
        $data="";


        date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$userid=$this->session->ref_id;
      
            if($id==""){
                $data = array(
                    'code'=>$this->input->post('code'),
					'newspaper_name'=>$this->input->post('newspaper_name'),
					'user_id'=>$userid,
                    'created_at'=>$date,
                    'updated_at'=>$date,
               );
              
            }else{
                $data = array(
					'code'=>$this->input->post('code'),
					'newspaper_name'=>$this->input->post('newspaper_name'),
					'user_id'=>$userid,
                     'updated_at'=>$date,
               );
              
            }
          
            
        
        if($id==""){
            $data1 = $this->Report_model->insertdata($table_name,$data);
        }else{
            $data1 = $this->Report_model->updatedata($table_name,$data,$id);
        }
        echo json_encode($data1);
    }
    public function deleteData()
    { 
		$table_name = $this->input->post('table_name');
        $id=$this->input->post('id');
       
        $data1=$this->Report_model->delete_data($table_name,$id);
    	echo json_encode($data1);
    }
    public function get_master(){
	
		$table_name	=$this->input->post('table_name');//"account_group"; //
		$data=$this->Report_model->data_get($table_name);			
		echo json_encode($data);	
    }
    public function generate_report(){
	
        
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$type=$this->input->post('type');
		$impact=$this->input->post('impact');
		$newspaper=$this->input->post('newspaper');
		$data=$this->Report_model->generate_report($from,$to,$type,$impact,$newspaper);			
		echo json_encode($data);	
	}
	
}
