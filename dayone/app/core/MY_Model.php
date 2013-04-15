<?php
class MY_Model extends CI_Model
{
    protected $_table;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('inflector'); // For pluralizationf of the table in _fetch_table
        self::_fetch_table();
    }

    /**
     * Guess the table name by pluralising the model name
     */
    private function _fetch_table()
    {
        if ($this->_table == NULL)
        {
            $this->_table = plural(preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this))));
        }
    }

    public function get_all()
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
        return ($delete) ? true : false;
    }

}
