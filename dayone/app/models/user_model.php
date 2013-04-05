<?php if (! defined('BASEPATH')) exit('No direct script access');

class User_model extends MY_Model
{

<<<<<<< HEAD
    public function all_users()
    {
        return $this->db->get($this->_table);
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table)->row();
    }

    public function add($data=array())
    {
        $this->db->insert($this->_table, $data);
	return $this->db->insert_id();
    }

    public function update($id, $data)
    {
	$this->db->update($this->_table, $data, ['id'=>$id]);
	return ($this->db->affected_rows()) ? true : false;
    }

    public function delete($id)
    {
	$delete = $this->db->delete($this->_table, ['id' => $id]);
	// if($delete)
	// {
	//     return true;
	// }
	// return false;
	return ($delete) ? true : false;

    }
=======
>>>>>>> develop
}
