<?php if (! defined('BASEPATH')) exit('No direct script access');

class Products extends CI_Controller {

    public $view = '';
    public $data = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model','product');
        self::_load_view();
    }

    function index()
    {
        $this->view = false;
    }

    private function _load_view()
    {
        die(var_dump($this->view));
        $this->view = $this->router->class . '/' . $this->router->method;
        $this->load->view($this->view, $this->data);
    }

}
