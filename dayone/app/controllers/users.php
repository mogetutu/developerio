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
        $data['user'] = $user = $this->user->get($id);
        self::check_user($this->user->get($id));
        $this->load->view('users/show', $data);

    }
    /**
     * Create New User Form
     * @return void
     */
    public function create()
    {
        $this->load->view('users/create');
    }

    /**
     * Add New users
     */
    public function add()
    {
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
    }

    /**
     * Delete User
     * @param  int $id
     * @return void
     */
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
    }

}
