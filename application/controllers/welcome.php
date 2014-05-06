<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->model('user'); 
		$this->user->update_last_activity();
		$this->nbusers = $this->user->count_users();
		$this->onlineusers = $this->user->count_connected();
		$data = array();
		
		$members = $this->user->get_home_members();
		
		$data['members'] = $members;
		
		$data['all'] = $this->nbusers;		
		$data['online'] = $this->onlineusers;		
		
		$data['title'] = "Site de Rencontre - BeWitU.com";
		
		//$data['profiles'] = $this->user->get_last_with_photo();
		
		if($this->user->check_session()) {
			$this->load->view('templates/header', $data);
			if(!$this->user->check_activated())
				$data['validation'] = false;
		} else
			$this->load->view('templates/header-guest', $data);
			
		$this->load->view('welcome_page', $data);
		$this->load->view('templates/footer', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */