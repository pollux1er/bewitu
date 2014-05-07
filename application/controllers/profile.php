<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('language');
		
		$this->load->model('user');
		$this->user->update_last_activity();
		$this->nbusers = $this->user->count_users();
		$this->onlineusers = $this->user->count_connected();
	}
	
	public function view_profile($id)
	{
		if ( ! file_exists('application/views/profile.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('user');
		
		if($this->session->userdata('pseudo'))
			if(!$this->user->check_activated())
				$data['validation'] = false;
			
		$this->load->library('form_validation');
		
		$profile = $this->user->get_profile($id);
		
		if(empty($profile))
			redirect( base_url() );
		
		$profile->age = $this->user->get_age($profile->birthdate);
		
		$profile->signe = $this->user->get_zodiac($profile->birthdate);
		
		$profile->pictures = $this->user->get_user_pictures($profile->profile_id);
		
		$this->user->increase_view_profile($profile->profile_id);
		
		$data['profile'] = $profile;
			
		$data['title'] = "BeWitU.com - $profile->pseudo | $profile->title";
		
		$data['description'] = $profile->description;
		
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		//var_dump($data);die;
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		$this->load->view('profile', $data);
		
		$this->load->view('templates/footer', $data);
		
	}
	
	public function list_latest($sex)
	{
		
		if ( ! file_exists('application/views/new_members.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->load->model('user');
		
		if($this->session->userdata('pseudo'))
			if(!$this->user->check_activated())
				$data['validation'] = false;
		
		$new_members = $this->user->get_new_members($sex);
		
		$data['title'] = "BeWitU.com - Nouveaux inscrits pour rencontre";
		
		$data['members'] = $new_members;
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		$this->load->view('new_members', $data);
		
		$this->load->view('templates/footer', $data);
		
	}
	
	public function list_online()
	{
		
		if ( ! file_exists('application/views/connected_members.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('user');
		
		if($this->session->userdata('pseudo'))
			if(!$this->user->check_activated())
				$data['validation'] = false;
		
		$new_members = $this->user->get_connected_members();
		
		$data['members'] = $new_members;
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		$this->load->view('new_members', $data);
		
		$this->load->view('templates/footer', $data);
		
	}
	
	public function photos()
	{
		if ( ! file_exists('application/views/photos.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('user');
		
		if($this->session->userdata('pseudo'))
			if(!$this->user->check_activated())
				$data['validation'] = false;
		
		
		
		$data['pseudo'] = $pseudo = $this->uri->segment(2, 0);
		
		$picture_id = $this->uri->segment(3, 0);
		
		$profile = $this->user->get_profile($pseudo);
		$data['description'] = $profile->title;
		$data['title'] = "BeWitU.com - $profile->pseudo | $profile->title";
		if(empty($profile))
			redirect( base_url() );
		
		$profile->age = $this->user->get_age($profile->birthdate);
		
		$profile->pictures = $this->user->get_user_pictures($profile->profile_id);
		
		$photo = $this->user->get_photo($picture_id);
		
		$data['photo'] = $photo;
		$data['profile'] = $profile;
		$data['pictures'] = $profile->pictures;
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		$this->load->view('photos', $data);
		
		$this->load->view('templates/footer', $data);
	}
	
	public function message()
	{
		if ( ! file_exists('application/views/message.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		if(!$this->user->check_session())
			redirect( base_url('form/inscription') );
		
		$data['recipient'] = $this->uri->segment(2, 0);	
		
		$this->load->model('message');
		
		$data['title'] = "BeWitU.com - Envoyer un message a " . $data['recipient'];
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		if($this->input->post('dest') != '' && $this->input->post('message') != '')
		{
			if(!$this->user->check_session()) {
				
				$this->session->set_userdata('message');
				$this->session->set_userdata('dest');
			
				redirect( base_url('form/inscription') );
			
			}
				
			$this->message->send_message();
			
			redirect( base_url('profile/' . $data['recipient']) );
		}
			
		$this->load->view('templates/header', $data);
				
		$this->load->view('message', $data);
		
		$this->load->view('templates/footer', $data);
	}
	
	public function update_profile($id)
	{
		if ( ! file_exists('application/views/profile_modify.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		if($this->session->userdata('pseudo'))
			if(!$this->user->check_activated())
				$data['validation'] = false;
			
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<span class="erreurs">', '</span>'); 
		$this->form_validation->set_rules('sexuality', 'sexuality', 'required', 'Veuillez preciser votre orientation sexuelle...');
		$profile = $this->user->get_profile($id);
		
		if($this->input->server('REQUEST_METHOD') == 'POST') {
				$user_data = array('sex' => $this->session->userdata('sex'),
									'birthdate'     => $this->input->post('birthdate-y') . "-" . $this->input->post('birthdate-m') . "-" . $this->input->post('birthdate-d'),
									'sex'     => $this->input->post('sex'),
								   'ville'     => $this->input->post('ville'),
								   'region'     => $this->input->post('region'),
								   'title'     => $this->input->post('title'),
								   'birthdate'     => $this->input->post('birthdate-y') . "-" . $this->input->post('birthdate-m') . "-" . $this->input->post('birthdate-d'),
								   'description'     => $this->input->post('description'),
                   
									'country' => $this->session->userdata('country'),
									'civil_status' => $this->input->post('civil_status'),
									'sexuality' => $this->input->post('sexuality'),
									'looking_for' => $this->input->post('looking_for'),
									'job' => $this->input->post('job'),
									'eye_color' => $this->input->post('eye_color'),
									'hair_color' => $this->input->post('hair_color'),
									'ethnicity' => $this->input->post('ethnicity'),
									'home_country' => $this->input->post('home_country'),
									'height_m' => $this->input->post('height_m'),
									'height_cm' => $this->input->post('height_cm'),
									'weight' => $this->input->post('weight'),
									'appearance' => $this->input->post('appearance'),
									'hobbies' => $this->input->post('hobbies'),
									);
				$result = $this->user->save_user_profile($user_data);
		}
		
		if(empty($profile))
			redirect( base_url() );
		
		$data['profile'] = $profile;
			
		$data['title'] = "BeWitU.com - Modifier votre profil";
		
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		$data['country'] = $this->user->get_user_country(); 	
		$this->load->view('templates/header', $data);
		
		$this->load->view('profile_modify', $data);
		
		$this->load->view('templates/footer', $data);
		
		
	}
	
	public function add_to_favourites()
	{
		
	}
	
}
