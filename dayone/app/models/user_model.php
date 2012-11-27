<?php if (! defined('BASEPATH')) exit('No direct script access');

class User_model extends CI_Model
{
    // Define the table
    protected $_table = 'users';

    public function all_users()
    {
        return $this->db->get($this->_table);
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table)->row();
    }

    public function add()
    {
        $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        return true;
    }

    public function delete()
    {
        return true;
    }
}