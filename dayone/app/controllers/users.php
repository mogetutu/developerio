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
	$data['user'] = $user = $this->user->get($id);
	self::check_user($this->user->get($id));
        $this->load->view('users/show', $data);

    }

    public function create()
    {
	$this->load->view('users/create');
    }

    public function add()
    {
	// $data = ['name'=>'minneh', 'email'=>'minneh@email.com'];
	// Grab $_POST variables from the form
	$data = $this->input->post();
	if($this->user->add($data))
	{
	    redirect('users/index');
	}
	else
	{
	    redirect('users/create');
	}
    }

    public function update($id)
    {
	// User model function
	$data['user'] = $user = $this->user->get($id);

	// Update function
	if($this->input->post())
	{
	    // update user with set id
	    $update = $this->user->update($id, $this->input->post());
	    if($update)
	    {
		redirect('users/show/' . $id);
	    }
	    redirect('users/update/' . $id);
	}
	self::check_user($this->user->get($id));
	$this->load->view('users/update', $data);
    }

    public function delete($id)
    {
	self::check_user($this->user->get($id));
	if($this->user->delete($id))
	{
	    $this->session->set_flashdata('message', 'User has been deleted.');
	}
	$this->session->set_flashdata('message', 'User not deleted.');
	redirect('users');
    }

    public function check_user($user)
    {
	if(!$user)
	{
	    $this->session->set_flashdata('message', 'Record doesnt Exist');
	    redirect('users');
	}
    }

}
