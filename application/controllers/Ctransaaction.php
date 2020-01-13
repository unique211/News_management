<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctransaaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
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
					'type'=>$this->input->post('type'),
					'impact_of_news'=>$this->input->post('impact_of_news'),
					'heading'=>$this->input->post('heading'),
					'size'=>$this->input->post('size'),
					'date'=>$this->input->post('date'),
					'image'=>$this->input->post('image'),
					'user_id'=>$userid,
                    'created_at'=>$date,
                    'updated_at'=>$date,
               );
              
            }else{
                $data = array(
					 'code'=>$this->input->post('code'),
					'newspaper_name'=>$this->input->post('newspaper_name'),
					'type'=>$this->input->post('type'),
					'impact_of_news'=>$this->input->post('impact_of_news'),
					'heading'=>$this->input->post('heading'),
					'size'=>$this->input->post('size'),
					'date'=>$this->input->post('date'),
					'image'=>$this->input->post('image'),
					'user_id'=>$userid,
                     'updated_at'=>$date,
               );
              
            }
          
            
        
        if($id==""){
            $data1 = $this->Transaction_model->insertdata($table_name,$data);
        }else{
            $data1 = $this->Transaction_model->updatedata($table_name,$data,$id);
        }
        echo json_encode($data1);
    }
    public function deleteData()
    { 
		$table_name = $this->input->post('table_name');
        $id=$this->input->post('id');
       
        $data1=$this->Transaction_model->delete_data($table_name,$id);
    	echo json_encode($data1);
    }
    public function get_master(){
	
		$table_name	=$this->input->post('table_name');//"account_group"; //
		$data=$this->Transaction_model->data_get($table_name);			
		echo json_encode($data);	
    }
    public function get_master_where(){
	
        $table_name	=$this->input->post('table_name');//"account_group"; //
        $id=$this->input->post('id');
		$data=$this->Transaction_model->get_master_where($table_name,$id);			
		echo json_encode($data);	
	}
	public function getdropdown()
	{

		$table_name	= $this->input->post('table_name'); //"account_group"; //
		$data = $this->Transaction_model->getdropdown($table_name);
		echo json_encode($data);
	}
	public function get_code()
	{

		$table_name	= $this->input->post('table_name');
		$newpaper_name = $this->input->post('newpaper_name');
		$data = $this->Transaction_model->get_code($table_name, $newpaper_name);
		echo json_encode($data);
	}
	public function get_newspaper()
	{
		$table_name	= $this->input->post('table_name');
		$code = $this->input->post('code');
		$data = $this->Transaction_model->get_newspaper($table_name, $code);
		echo json_encode($data);

	}
	public function doc_image_upload()
    {
        $this->load->helper("file");
        $this->load->helper(array('form', 'url'));
        $this->load->helper('directory');
        $this->load->library("upload");
        //  $id=$this->input->post('id');
        if ($_FILES['attachment']['size'] > 0) {
            $this->upload->initialize(array(
                "upload_path" => './Upload/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
            ));
            if (!$this->upload->do_upload('attachment')) {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
            $data = $this->upload->data();
            $path = $data['file_name'];
            echo json_encode($path);
        } else {
            echo "no file";
        }
    }
	
}
