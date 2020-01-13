<?php
class Settings_model extends CI_Model
{

    function insertdata($data, $table)
    {
        $this->db->insert($table, $data);
        $result = $this->db->insert_id();
        return $result;
    }
    function insertdata_login($data)
    {
        $this->db->insert('login_master', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    function updatedata($data, $table, $id)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($table, $data);
        return $result;
    }
    function updatedata_user($data, $table_name, $mobile)
    {
        $this->db->where('mobile', $mobile);
        $result = $this->db->update($table_name, $data);
        return $result;
    }
    function insertdata_staff($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }
    function updatedata_staff($data, $table, $id)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($table, $data);
        return $result;
    }
    function updatedata_staff_login($data, $table, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->update($table, $data);
        return $result;
    }
    function updatedata_login($data, $id)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('login_master', $data);
        return $result;
    }
    function updatedata_login_user($data, $mobile)
    {
        $this->db->where('user_id', $mobile);
        $result = $this->db->update('login_master', $data);
        return $result;
    }
    function check_login()
    {
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('password');
        // $user_id ="admin";
        //  $password ="admin";



        $msg = 0;
        $this->db->select('login_master.*');
        $this->db->from('login_master');
        $this->db->where('user_id', $user_id);
        $this->db->where('password', $password);
        $this->db->where('status', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $get_password = $query->row()->password;
            $role = $query->row()->role;
            $user_id = $query->row()->user_id;
			$ref_id=$query->row()->ref_id;
                  



            if (($user_id == $user_id) && ($get_password == $password)) {
                $msg = 1;



                $this->session->userid = $user_id;
                $this->session->role = $role;
                $this->session->ref_id = $ref_id;
             
            }
        }


        return $msg;
        //echo $this->db->last_query();
    }
    function showalldata($table)
    {
        if ($table == "staff_master") {
            $this->db->select('staff_master.*,login_master.password,department_master.department');
            $this->db->from('staff_master');
            $this->db->join('login_master', 'login_master.user_id=staff_master.user_id');
            $this->db->join('department_master', 'department_master.id=staff_master.department_id');
            $query = $this->db->get();
            return $query->result();
        }
    }
    function delete_data($table_name, $id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    function deletedata_staff($table_name, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->delete($table_name);
        return $result;
    }
    function data_get($table)
    {
        if ($table == 'department_master') {
            $this->db->order_by('department', 'ASC');
        }
        $hasil = $this->db->get($table);
        return $hasil->result();
    }
    function chk_user_id($user_id)
    {
        $this->db->select('login_master.*');
        $this->db->from('login_master');
        //   $this->db->join('user_registration','user_registration.mobile=login_master.user_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
