<?php if (! defined('BASEPATH')) exit('No direct script access');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        // Listed users and pushed them to the view
        $data['users'] = $this->user->all_users()->result();
        $this->load->view('users/index', $data);
    }

    public function show($id)
    {
        $data['user'] = $this->user->get($id);
        $this->load->view('users/show', $data);
    }

    public function create()
    {
        echo "Load a page with a form to create a user";
    }

    public function add()
    {
        echo "Insert a user to the database";
    }

    public function update()
    {
        echo "Update a user's record";
    }

    public function delete($id)
    {
        echo "Delete a user from the database";
    }

}