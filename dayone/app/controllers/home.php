<?php
if (! defined('BASEPATH')) exit('No direct script access');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo "Hello world";
    }

}