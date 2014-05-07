<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('language');
		$this->load->model('user'); 
		$this->nbusers = $this->user->count_users();
		$this->onlineusers = $this->user->count_connected();
		$this->user->update_last_activity();
	}
	
	public function form($form = 'login')
	{
		if ( ! file_exists('application/views/forms/'.$form.'.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		$data['title'] = ucfirst($form); // Capitalize the first letter
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		$this->load->view('templates/header-guest', $data);
		$this->load->view('forms/'.$form, $data);
		$this->load->view('templates/footer', $data);

	}
	
	public function logout()
	{
		$this->user->logout();
		redirect( base_url() );
	}
	
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="erreurs">', '</span>');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[5]|max_length[12]', 'Votre pseudo est necessaire...');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', 'Vous devez fournir un mot de passe');
		
		$data['title'] = 'BeWitU.com - Acces membres';
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		if($this->input->post('username') != '' && $this->input->post('password'))
			if (!$this->user->login($this->input->post('username'), $this->input->post('password')))
			{
				$this->load->view('templates/header-guest', $data);
				$this->load->view('forms/login', $data);
				$this->load->view('templates/footer', $data);
			}
			else
			{
				$this->session->set_userdata('connected', 1);
				redirect( base_url() );
			}
		else {
			$this->load->view('templates/header-guest', $data);
			$this->load->view('forms/login', $data);
			$this->load->view('templates/footer', $data);
		}
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
		
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[5]|max_length[12]|is_unique[users.pseudo]', 'Votre pseudo est necessaire...');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]', 'Vous devez fournir un mot de passe');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required', 'Le mot de passe doit etre confirme');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]', 'Votre adresse email est incorrecte.');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean', 'Essayez de vous decrire en quelques lignes...');
		$this->form_validation->set_rules('sex', 'Sexe', 'required', 'Vous devez preciser votre genre');
		$this->form_validation->set_rules('title', 'Titre ou Slogan', 'required');
		$this->form_validation->set_rules('conditions1', 'Termes et conditions', 'callback_accept_terms');
		
		$data['title'] = 'BeWitU.com - Inscription (Etape 1)';
		$data['country'] = $this->user->get_user_country(); 
		//$data['country'] = "CAMER"; 
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
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
                   'pays'     => $this->input->post('pays'),
                   'ville'     => $this->input->post('ville'),
                   'region'     => $this->input->post('region'),
                   'title'     => $this->input->post('title'),
                   'birthdate'     => $this->input->post('birthdate-y') . "-" . $this->input->post('birthdate-m') . "-" . $this->input->post('birthdate-d'),
                   'description'     => $this->input->post('description'),
                   'country'     => $data['country'],
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
		
		// Check if the guy has succesfully done the 1st step
		if(!$this->session->userdata('pseudo')) {
			redirect( base_url() . 'form/inscription' );
		}
		
		$data = array();
		
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		
		$data['title'] = 'BeWitU.com - Inscription (Etape 2)';
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		$this->load->view('templates/header-guest', $data);
		
		$this->form_validation->set_error_delimiters('<span class="erreurs">', '</span>'); 
		$this->form_validation->set_rules('orientation', 'Orientation', 'required', 'Veuillez preciser votre orientation sexuelle...');
		$this->form_validation->set_rules('but', 'But', 'required', 'Veuillez preciser votre but sur le site');
		$this->form_validation->set_rules('etatcivil', 'Etat Civil', 'required', 'Veuillez preciser votre Etat civil');
		$this->form_validation->set_rules('recaptcha_response_field', 'Captcha', 'required|callback_validateCaptcha', 'Captcha Incorrecte');
		
		$data['recaptcha'] = $this->recaptcha->get_html();
		
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			if($this->form_validation->run() == FALSE) { 
				//$data['response'] = "Correct Captcha!!!!!";
				$this->load->view('forms/inscription2', $data);
			} else {
				//Sauvegarde des donnees a la base de donnees
				$this->load->model('user');
				$user_data = array('pseudo' => $this->session->userdata('pseudo'),
									'sex' => $this->session->userdata('sex'),
									'password' => $this->session->userdata('password'),
									'email' => $this->session->userdata('email'),
									'birthdate' => $this->session->userdata('birthdate'),
									'title' => $this->session->userdata('title'),
									'region' => $this->session->userdata('region'),
									'town' => $this->session->userdata('ville'),
									'country' => $this->session->userdata('country'),
									'description' => $this->session->userdata('description'),
									'civil_status' => $this->input->post('etatcivil'),
									'sexuality' => $this->input->post('orientation'),
									'looking_for' => $this->input->post('but'),
									'job' => $this->input->post('job'),
									'eye_color' => $this->input->post('eye_color'),
									'hair_color' => $this->input->post('hair_color'),
									'ethnicity' => $this->input->post('ethnicity'),
									'home_country' => $this->input->post('home_country'),
									'height_m' => $this->input->post('metres'),
									'height_cm' => $this->input->post('cm'),
									'weight' => $this->input->post('weight'),
									'appearance' => $this->input->post('appearance'),
									'hobbies' => $this->input->post('passetemps'),
									);
				$result = $this->user->save_user_profile($user_data);
				
				if($result) {
					$user_data['profile_id'] = $result;
					$user_data['activation_code'] = $this->session->userdata('pseudo');
					
					$this->user->insert_user($user_data);
					
					$this->session->set_userdata('user_id', $user_data['profile_id']);
									
					//Envois de l'email pour activation de compte
					$this->user->send_activation_link($user_data['email']);
					
				} else {
				
				}
				
				redirect( base_url() . 'form/inscription_end' );
			}
		} else {
					
			$this->load->view('forms/inscription2', $data);
			
		}
		
		$this->load->view('templates/footer', $data);
	}
	
	public function inscription_end()
	{
		if ( ! file_exists('application/views/forms/inscription_end.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		
		$data = array();
		$this->session->set_userdata('connected', 1);
		$data['username'] = $this->session->userdata('pseudo');
		$data['email'] = $this->session->userdata('email');
		$data['password'] = $this->session->userdata('password');
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		$data['error'] = '';
		
		$data['title'] = 'BeWitU.com - Inscription (Telecharger une photo de vous)';
		
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		$this->load->view('forms/inscription_end', $data);
		
		$this->load->view('templates/footer', $data);
		
		
	}
	
	public function inscription_upload_image()
	{
		if ( ! file_exists('application/views/forms/inscription_upload.php'))
		{
			// Whoops, we don't have a form for that!
			show_404();
		}
		if(!$this->session->userdata('pseudo'))
			redirect( base_url('form/inscription') );
			
		$this->session->set_userdata('last_url', base_url(uri_string()));	
		
		$this->load->model('user');
		
		if(!$this->user->check_activated())
			$data['validation'] = false;
		
		//$data['scripts to load'] = array('jquery-pack.js','jquery.imgareaselect.min.js');
		$data['username'] = $this->session->userdata('pseudo');
		$data['email'] = $this->session->userdata('email');
		$data['password'] = $this->session->userdata('password');
		$data['title'] = 'BeWitU.com - Inscription (Telecharger une photo de vous)';
			
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '4000';
		$config['max_height']  = '4000';
		$config['image_library'] = 'gd2';
		
		$this->load->library('upload', $config);
		
		$data['all'] = $this->nbusers;
		$data['online'] = $this->onlineusers;
		
		if($this->session->userdata('connected'))
			$this->load->view('templates/header', $data);
		else
			$this->load->view('templates/header-guest', $data);
		
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['pictures'] = $pictures = $this->user->get_pictures($this->session->userdata('user_id'));
			$this->load->view('forms/inscription_upload', $data);
		}
		else
		{
			
			$data['error'] = '';
		
			$image_info = $this->upload->data();
			
			$img_path = './uploads/'.$image_info['file_name'];
			$img_thumb = './uploads/'.$image_info['raw_name'] . '_thumb' . $image_info['file_ext'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = $img_path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			
			////////////////////// crop
			$img = imagecreatefromjpeg($config['source_image']);
			$_width = imagesx($img);
			$_height = imagesy($img);
			
			$img_type = '';
			$thumb_size = 120;

			if ($_width > $_height)
			{
				// wide image
				$config['width'] = intval(($_width / $_height) * $thumb_size);
				if ($config['width'] % 2 != 0)
				{
					$config['width']++;
				}
				$config['height'] = $thumb_size;
				$img_type = 'wide';
			}
			else if ($_width < $_height)
			{
				// landscape image
				$config['width'] = $thumb_size;
				$config['height'] = intval(($_height / $_width) * $thumb_size);
				if ($config['height'] % 2 != 0)
				{
					$config['height']++;
				}
				$img_type = 'landscape';
			}
			else
			{
				// square image
				$config['width'] = $thumb_size;
				$config['height'] = $thumb_size;
				$img_type = 'square';
			}
			
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->display_errors('<p style="color:red">', '</p>');
			$this->image_lib->resize();
			
			 // reconfigure the image lib for cropping
			$conf_new = array(
				'image_library' => 'gd2',
				'source_image' => $img_thumb,
				'create_thumb' => FALSE,
				'maintain_ratio' => FALSE,
				'width' => $thumb_size,
				'height' => $thumb_size
			);

			if ($img_type == 'wide')
			{
				$conf_new['x_axis'] = ($config['width'] - $thumb_size) / 2 ;
				$conf_new['y_axis'] = 0;
			}
			else if($img_type == 'landscape')
			{
				$conf_new['x_axis'] = 0;
				$conf_new['y_axis'] = ($config['height'] - $thumb_size) / 2;
			}
			else
			{
				$conf_new['x_axis'] = 0;
				$conf_new['y_axis'] = 0;
			}

			$this->image_lib->initialize($conf_new);

			$this->image_lib->crop();
	
			$this->image_lib->clear();
			
			$thumb = $image_info['raw_name'] . '_thumb' . $image_info['file_ext'];
			
			$this->user->save_picture($image_info['file_name'], $this->session->userdata('user_id'), $image_info['orig_name'], $image_info['raw_name'], $thumb);
			
			//$data['user_id'] = $this->session->userdata('user_id');
			
			$data['pictures'] = $pictures = $this->user->get_pictures($this->session->userdata('user_id'));

			$this->load->view('forms/inscription_upload', $data);
			
			
		}
		
		$this->load->view('templates/footer', $data);
	}
	
	public function revalidate()
	{
		if(!$this->session->userdata('email'))
			redirect( base_url() );
			
		$this->user->send_activation_link($this->session->userdata('pseudo'));
		
		if(!$this->session->userdata('last_url'))
			redirect( base_url() );
		
	}
	
	public function delete_picture($id)
	{
		$this->load->model('user');
		$this->user->delete_picture($id);
		redirect( base_url() . 'form/inscription_upload_image' );
	}
	
	public function default_picture($id)
	{
		$this->load->model('user');
		$this->user->default_picture($id);
		redirect( base_url() . 'form/inscription_upload_image' );
	}
	
	public function validateCaptcha($value) 
	{
		if ($this->recaptcha->check_answer($_SERVER['REMOTE_ADDR'],$this->input->post('recaptcha_challenge_field'),$value)) {
			return TRUE;
		} else {
			$this->form_validation->set_message(__FUNCTION__, lang('recaptcha_incorrect_response'));
			return FALSE;
		}
	}
	
	public function accept_terms() {
		if (isset($_POST['conditions1']) && isset($_POST['conditions2'])) return true;
		$this->form_validation->set_message('accept_terms', 'Veuillez accepter nos termes et conditions.');
		return false;
	}
}
