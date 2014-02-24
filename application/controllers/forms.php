<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends CI_Controller {
	
	
	public function form($form = 'login')
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
	
	public function inscription()
	{
		if ( ! file_exists('application/views/forms/inscription.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="erreurs">', '</span>');
		
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[5]|max_length[12]|is_unique[users.pseudo]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|md5');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sex', 'Sexe', 'required');
		$this->form_validation->set_rules('title', 'Titre ou Slogan', 'required');
		$this->form_validation->set_message('sex', 'Vous devez selectionner votre genre');
		
		$data['title'] = 'BeWitU.com - Inscription (Etape 1)';
		
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		
		$this->load->view('templates/header-guest', $data);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('forms/inscription', $data);
		}
		else
		{
			$newdata = array(
                   'pseudo'  => $this->input->post('pseudo'),
                   'password'  => $this->input->post('password'),
                   'email'     => $this->input->post('email'),
                   'sex'     => $this->input->post('sex'),
                   'title'     => $this->input->post('title'),
                   'birthdate-d'     => $this->input->post('birthdate-d'),
                   'birthdate-m'     => $this->input->post('birthdate-m'),
                   'birthdate-y'     => $this->input->post('birthdate-y'),
                   'description'     => $this->input->post('username'),
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($newdata);
			
			redirect( base_url() . 'form/inscription2' );
		}
		
		$this->load->view('templates/footer', $data);
		
	}
	
	public function inscription2()
	{
		if ( ! file_exists('application/views/forms/inscription2.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="erreurs">', '</span>');
		
		$data['title'] = 'BeWitU.com - Inscription (Etape 1)';
		
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		
		$this->load->view('templates/header-guest', $data);
		
		$this->load->view('templates/footer', $data);
		
	}
}
