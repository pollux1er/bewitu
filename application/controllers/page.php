<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	
	
	public function pages($page = 'home')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('user');
		$this->user->update_last_activity();
		$this->nbusers = $this->user->count_users();
		$this->onlineusers = $this->user->count_connected();
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
	
	public function forms($form = 'login')
	{
		if ( ! file_exists('application/views/forms/'.$form.'.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		$this->load->helper('form');
		$data['title'] = ucfirst($form); // Capitalize the first letter
		
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->view('templates/header-guest', $data);
		$this->load->view('forms/'.$form, $data);
		$this->load->view('templates/footer', $data);

	}
	
}
