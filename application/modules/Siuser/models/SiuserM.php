<?php 


class SiuserM extends CI_Model{

    public function save_data($data){
        $this->db->insert('users',$data);
    }

    public function get_all_data(){
        return $this->db->get('users')->result_array();
    }

    public function get_user($uid){
        $this->db->where('uid', $uid);
        return $this->db->get('users')->first_row();
    }

    public function edit_data_user($data, $uid){
        $this->db->set('email', $data['email']);
        $this->db->set('password', $data['password']);
        $this->db->set('full_name', $data['full_name']);
        $this->db->set('address', $data['address']);
        $this->db->set('gender', $data['gender']);
        $this->db->where('uid', $uid);
        $this->db->update('users');
    }

    public function edit_data_user_image($data, $uid){
        $this->db->set('image', $data['image']);
        $this->db->where('uid', $uid);
        $this->db->update('users');
    }

    public function delete_data($uid){
        $this->db->where('uid', $uid);
        $this->db->delete('users');
    }
}