<?php if (! defined('BASEPATH')) exit('No direct script access');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }
    /**
     * List All Users
     * @return array
     */
    public function index()
    {
        $data['users'] = $this->user->get_all()->result();
        $this->load->view('users/index', $data);
    }
    /**
     * Show User by id
     * @param  int $id
     * @return array
     */
    public function show($id)
    {
<<<<<<< HEAD
	$data['user'] = $user = $this->user->get($id);
	self::check_user($this->user->get($id));
        $this->load->view('users/show', $data);

    }
=======
        $data['user'] = $user = $this->user->get($id);
        self::check_user($this->user->get($id));
        $this->load->view('users/show', $data);
>>>>>>> develop

    }
    /**
     * Create New User Form
     * @return void
     */
    public function create()
    {
<<<<<<< HEAD
	$this->load->view('users/create');
=======
        $this->load->view('users/create');
>>>>>>> develop
    }

    /**
     * Add New users
     */
    public function add()
    {
<<<<<<< HEAD
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
=======
        $data = $this->input->post();
        if($this->user->add($data))
        {
            redirect('users/index');
        }
        redirect('users/create');
    }

    /**
     * Update user record
     * @param  int $id
     * @return void
     */
    public function update($id)
    {
        $data['user'] = $user = $this->user->get($id);

        if($this->input->post())
        {
            $update = $this->user->update($id, $this->input->post());
            if($update)
            {
                redirect('users/show/' . $id);
            }
            redirect('users/update/' . $id);
        }
        self::check_user($this->user->get($id));
        $this->load->view('users/update', $data);
>>>>>>> develop
    }

    /**
     * Delete User
     * @param  int $id
     * @return void
     */
    public function delete($id)
    {
<<<<<<< HEAD
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
=======
        self::check_user($this->user->get($id));
        if($this->user->delete($id))
        {
            $this->session->set_flashdata('message', 'User has been deleted.');
        }
        $this->session->set_flashdata('message', 'User not deleted.');
        redirect('users');
    }
    /**
     * Check User if user exists or Redirect
     * @param  bool $user
     * @return void
     */
    public function check_user($user)
    {
        if(!$user)
        {
            $this->session->set_flashdata('message', 'Record doesnt Exist');
            redirect('users');
        }
>>>>>>> develop
    }

}
