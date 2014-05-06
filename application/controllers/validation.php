<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validation extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('language');
		$this->load->model('user');
		$this->user->update_last_activity();
		
	}
	
	public function email()
	{
		$activation_code = $this->uri->segment(3, 0);
		
		if($this->user->check_activation($this->uri->segment(3, 0)))
		{
			$this->session->set_userdata('activation_message', 1);
			
			$this->session->set_userdata('connected', 1);
			
			redirect( base_url() . 'profile/' . $this->session->userdata('pseudo') );
		}
		
		redirect( base_url() );
	}
	
	public function photo()
	{
		$this->nbusers = $this->user->count_users();
		$this->onlineusers = $this->user->count_connected();
		
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		$photo_id = $this->uri->segment(3, 0);
		
		if($this->input->post('id'))
			$this->user->validate_photo($this->input->post('id'));
		
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
			
		if($this->session->userdata('connected')) 
		{
			$data['picture'] = $this->user->get_unvalidated_photo();
			
			if(empty($data['picture'])) {
				$this->session->unset_userdata('id');
				redirect( base_url() );
			}
				
			$this->load->view('moderer_photo.php', $data);
			
		} else
			redirect( base_url('form/inscription') );
		
		$this->load->view('templates/footer', $data);
		
	}
	
}
