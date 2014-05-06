<?php

class Message extends CI_Model {
	
	private $table;
	public $conversation_id;
	public $message_id;
	public $sender;
	public $recipient;
	
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function open_message()
	{
	
	}
	
	public function delete_message()
	{
	
	}
	
	public function open_conversation()
	{
	
	}
	
	public function mark_as_read()
	{
		$sql = "UPDATE users SET last_activity = NOW() WHERE pseudo = " . $this->db->escape($this->session->userdata('pseudo'));
		$this->db->query($sql);
	}
	
	public function send_message()
	{	
		$this->sender = $this->session->userdata('pseudo');
		$this->recipient = $this->input->post('dest');
		$message = $this->input->post('message');
		
		$this->create_conversation();
		
		$this->send_email_to_recipient($message);
		
		return $this->save_message($message);
	}
	
	public function send_email_to_recipient()
	{
	
	}
	
	public function save_message($message)
	{
		$sql = "INSERT INTO `messages` (`id`, `conversation_id` ,`texte`, `sender_pseudo`, `sent_on`, `read_status`) 
				VALUES ('', $this->conversation_id, " . $this->db->escape($message) . ", " . $this->db->escape($this->sender) . ", NOW(), '0')";
			
		$this->db->query($sql);
		
		return $this->db->insert_id();
	}
	
	public function create_conversation()
	{
		if($this->conversation_exists($this->sender, $this->recipient))
		{
			
		} else {
			$sql = "INSERT INTO `conversation` (`id` ,`last_activity`) VALUES ('', NOW())";
			
			$this->db->query($sql);
			
			$this->conversation_id = $this->db->insert_id();
			
			$this->add_user_to_conversation($this->sender);
			$this->add_user_to_conversation($this->recipient);
		}
	}
	
	public function add_user_to_conversation($pseudo)
	{
		$sql = "INSERT INTO `users_conversation` (`conversation_id` ,`user_pseudo`) VALUES (" . $this->db->escape($this->conversation_id) . ", " . $this->db->escape($pseudo) . ")";
			
		$this->db->query($sql);
	}
	
	public function conversation_exists($sender, $recipient)
	{
		$sql = "SELECT id, ucs.user_pseudo, ucr.user_pseudo 
				FROM conversation c 
				LEFT JOIN users_conversation ucs ON ucs.conversation_id = c.id AND ucs.user_pseudo = " . $this->db->escape($sender) . " 
				LEFT JOIN users_conversation ucr ON ucr.conversation_id = c.id AND ucr.user_pseudo = " . $this->db->escape($recipient) . " 
				WHERE ucr.user_pseudo IS NOT NULL AND ucs.user_pseudo IS NOT NULL LIMIT 1
				";
		
		$query = $this->db->query($sql);
		
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		
			$this->conversation_id = $row->id;
			
			return true;
		}
		return false;
	}
	
	public function send_email($email)
	{
		
		$this->load->library('email');
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->from('contacts@bewitu.com', 'BeWitU.com');
		$this->email->to($email);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$activation_mail = "<br />Bonjour vadelde,<br />
		<br />Merci d'avoir rejoint BeWitU le 21 Avril 2014 à 01:10. 
		<br />Merci de cliquer sur le lien suivant pour confirmer la validité de votre email et accepter de recevoir des emails de notre part. Si vous confirmez votre email, nous vous enverrons des emails quand de nouvelles personnes tenteront de vous contacter à partir du site.<br /><a href=\"http://www.bewitu.com/validation/email/".md5($this->session->userdata('pseudo'))."\">http://www.bewitu.com/validation/email/".md5($this->session->userdata('pseudo'))."</a><br /> <br />Si vous n'êtes pas la personne qui s'est inscrite sur le site ou si vous ne désirez plus recevoir d'email de notre part, merci de cliquer sur le lien suivant pour désinscrire votre email.<br /><a href=\"http://www.bewitu.com/validation/delete_email/".md5($this->session->userdata('pseudo'))."\">http://www.bewiyu.com/validation/delete_email/".md5($this->session->userdata('pseudo'))."</a><br /> <br /><br />Voici les identifiants que vous avez choisi:
		<br />Pseudo : ". $this->session->userdata('pseudo') . "
		<br />Passe : ".$this->session->userdata('password')."<br /> <br />Cordialement,<br />BeWitU<br /> <br />";

		$this->email->subject("Bienvenue sur BeWitU");
		$this->email->message($activation_mail);

		$this->email->send();

	}
	
}
