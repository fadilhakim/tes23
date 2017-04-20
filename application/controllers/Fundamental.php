<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fundamental extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/v_t_meta');
		$this->load->view('templates/header');
		$this->load->view('v_home');
		$this->load->view('templates/v_t_footer');
	}

}
