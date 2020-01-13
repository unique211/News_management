<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMaster extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
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
            $data1 = $this->Master_model->insertdata($table_name,$data);
        }else{
            $data1 = $this->Master_model->updatedata($table_name,$data,$id);
        }
        echo json_encode($data1);
    }
    public function deleteData()
    { 
		$table_name = $this->input->post('table_name');
        $id=$this->input->post('id');
       
        $data1=$this->Master_model->delete_data($table_name,$id);
    	echo json_encode($data1);
    }
    public function get_master(){
	
		$table_name	=$this->input->post('table_name');//"account_group"; //
		$data=$this->Master_model->data_get($table_name);			
		echo json_encode($data);	
    }
    public function get_master_where(){
	
        $table_name	=$this->input->post('table_name');//"account_group"; //
        $id=$this->input->post('id');
		$data=$this->Master_model->get_master_where($table_name,$id);			
		echo json_encode($data);	
	}
	
}
