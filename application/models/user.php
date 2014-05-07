<?php

class User extends CI_Model {
	
	private $table;
	
    function __construct()
    {
        parent::__construct();
		$this->table = 'users';
		$this->table_profile = 'profile';
		$this->table_pic = 'pictures';
		$this->load->database();
    }
	
	public function insert_user($data)
	{	
		$sql = "INSERT INTO $this->table ( `pseudo` , `email` , `password` , `profile_id` , `registered_on` , `activation_code` , `activated`)
				VALUES (".$this->db->escape($data['pseudo']).", ".$this->db->escape($data['email']).", 
						MD5( ".$this->db->escape($data['password'])." ) , ".$this->db->escape($data['profile_id']).", NOW(), 
						MD5( ".$this->db->escape($data['activation_code'])." ) , '0'
				)";
		
		$this->db->query($sql);
		////////
		// $query = $this->db->query('SELECT LAST_INSERT_ID()');
		// $row = $query->row_array();
		// return $row['LAST_INSERT_ID()'];
		////////////
	}
	
	public function save_user_profile($data)
	{
		$sql = "INSERT INTO `profile` (`appearance` ,`sex` ,`country` ,
										`region` ,`town` ,`birthdate` ,`title` ,`description` ,
										`civil_status` ,`sexuality` ,`looking_for` ,`job` ,
										`eye_color` ,`hair_color` ,`ethnicity` , `home_country` ,
										`weight` , `height_m` , `height_cm`,  `hobbies`) 
				VALUES (".$this->db->escape($data['appearance']).", ".$this->db->escape($data['sex']).",
						".$this->db->escape($data['country']).", ".$this->db->escape($data['region']).", 
						".$this->db->escape($data['town']).", ".$this->db->escape($data['birthdate']).", 
						".$this->db->escape($data['title']).", ".$this->db->escape($data['description']).", 
						".$this->db->escape($data['civil_status']).", ".$this->db->escape($data['sexuality']).", 
						".$this->db->escape($data['looking_for']).", ".$this->db->escape($data['job']).", 
						".$this->db->escape($data['eye_color']).", ".$this->db->escape($data['hair_color']).", 
						".$this->db->escape($data['ethnicity']).", ".$this->db->escape($data['home_country']).", 
						".$this->db->escape($data['weight']).", ".$this->db->escape($data['height_m']).", 
						".$this->db->escape($data['height_cm']).", ".$this->db->escape(implode(",", $data['hobbies'])).")";
		//var_dump($sql); die;
		$this->db->query($sql);
		
		return $this->db->insert_id();
	}
	
	public function count_users()
	{
		return $this->db->count_all($this->table);
	}
	
	public function count_connected_users()
	{
		$query = $this->db->query("SELECT last_activity FROM $this->table WHERE last_activity BETWEEN timestamp(DATE_SUB(NOW(), INTERVAL 30 MINUTE)) AND timestamp(NOW())");

		return $query->num_rows();
	}
	
	public function count_connected()
	{
		return $this->db->count_all('ci_sessions');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
	}
	
	public function login($login, $password)
	{
		$query = $this->db->query("SELECT users.*, profile.* FROM users LEFT JOIN profile ON users.profile_id = profile.profile_id WHERE users.pseudo = ". $this->db->escape($login) . " AND password = " . $this->db->escape(md5($password)) . " LIMIT 1" );
			
		$row = $query->row();
		
		if(empty($row))
			return false;
		//var_dump($row); die;
		$newdata = array(
                   'pseudo'  => $row->pseudo,
                   'user_id'  => $row->profile_id,
                   'password'  => $row->password,
                   'email'     => $row->email,
                   'sex'     => $row->sex,
                   'logged_in' => TRUE,
				   'connected' => 1
               );
		$this->update_last_login($row->pseudo);
		$this->session->set_userdata($newdata);
		return true;
	}
	
	public function update_last_activity()
	{
		if($this->session->userdata('pseudo')) {
			$sql = "UPDATE users SET last_activity = NOW() WHERE pseudo = " . $this->db->escape($this->session->userdata('pseudo'));
			$this->db->query($sql);
		}
	}
	
	private function update_last_login($pseudo)
	{
		if($pseudo) {
			$sql = "UPDATE users SET last_login = NOW() WHERE pseudo = " . $this->db->escape($pseudo);
			$this->db->query($sql);
		}
	}
	
	public function get_last_with_photo()
	{
		$pictures = array();
		
		$query = $this->db->query("SELECT u.pseudo, p.profile_id, p.sex, p.country, p.region, p.region, p.title, p.birthdate, p.description, p.sexuality, p.looking_for,
									FROM users u
									LEFT JOIN profile p ON user.profile_id = profile.profile_id
									LEFT JOIN pictures pic ON profile.profile_id = pic.user_id
									WHERE user_id = $user_id AND pic.deleted = 0");
		
		foreach ($query->result() as $row)
		{
			$pictures[] = $row;			
		}
		
		return $pictures;	
	}
	
	public function check_activated()
	{
		if($this->session->userdata('pseudo')) {
			$query = $this->db->query("SELECT activated FROM users WHERE users.pseudo = ". $this->db->escape($this->session->userdata('pseudo')));
			
			$row = $query->row();
			
			if(!$row->activated)
				return false;
			
			return true;
		}
		
		return 'guest';
	}
	
	public function check_activation($code)
	{
		if(strlen($code) != 32)
			return false;
		
		$query = $this->db->query("SELECT activated, pseudo FROM users WHERE users.activation_code = ". $this->db->escape($code));
			
		$row = $query->row();
			
		if(!$row->activated)
		{
			$sql = "UPDATE users SET activated = 1 WHERE activation_code = " . $this->db->escape($code);
		
			$this->db->query($sql);
			
			$this->session->set_userdata('pseudo', $row->pseudo);
			
			return true;
		}
			
		return false;
	}
	
	public function report_profile($id)
	{
	
	}
	
	public function add_profile_tofavourites($id)
	{
	
	}
	
	public function add_to_friends($id)
	{
	
	}
	
	public function vote_profile($id)
	{
	
	}
	
	public function activate_user($activation_code)
	{
		$sql = "UPDATE pictures SET deleted = 1 WHERE id = " . $this->db->escape($id);
		
		$this->db->query($sql);
	}
	
	public function send_activation_link($email)
	{
		$this->load->helper('email');
		$this->load->library('email');
		
		if (valid_email($email))
		{
			$this->load->helper('date');
		
			$date = date("d/m/Y");
			$time = time();

			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->from('contacts@bewitu.com', 'BeWitU.com');
			$this->email->to($email);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			$activation_mail = "<br />Bonjour ". $this->session->userdata('pseudo') . ",<br />
			<br />Merci d'avoir rejoint BeWitU le $date à $time. 
			<br />Merci de cliquer sur le lien suivant pour confirmer la validité de votre email et accepter de recevoir des emails de notre part. Si vous confirmez votre email, nous vous enverrons des emails quand de nouvelles personnes tenteront de vous contacter à partir du site.<br /><a href=\"http://www.bewitu.com/validation/email/".md5($this->session->userdata('pseudo'))."\">http://www.bewitu.com/validation/email/".md5($this->session->userdata('pseudo'))."</a><br /> <br />Si vous n'êtes pas la personne qui s'est inscrite sur le site ou si vous ne désirez plus recevoir d'email de notre part, merci de cliquer sur le lien suivant pour désinscrire votre email.<br /><a href=\"http://www.bewitu.com/validation/delete_email/".md5($this->session->userdata('pseudo'))."\">http://www.bewitu.com/validation/delete_email/".md5($this->session->userdata('pseudo'))."</a><br /> <br /><br />Voici les identifiants que vous avez choisi:
			<br />Pseudo : ". $this->session->userdata('pseudo') . "
			<br />Passe : ".$this->session->userdata('password')."<br /> <br />Cordialement,<br />BeWitU<br /> <br />";

			$this->email->subject("Bienvenue sur BeWitU");
			$this->email->message($activation_mail);

			$this->email->send();
			
			$this->save_email($activation_mail);
		}
		else
		{
			$this->send_activation_link($this->get_email($email));
		}
	}
	
	private function get_email($pseudo)
	{
		$query = $this->db->query("SELECT email FROM users WHERE pseudo = ". $this->db->escape($pseudo));
			
		$row = $query->row();
		
		return $row->email;
	}
	
	private function save_email($activation_mail)
	{
		$sql = "INSERT INTO emails_to_resend (`pseudo` , `mail`)
				VALUES (".$this->db->escape($this->session->userdata('pseudo')).", ".$this->db->escape($activation_mail).")";
		
		$this->db->query($sql);
	}
	
	public function save_picture($image_name, $user_id, $orig, $raw, $thumb)
	{
		$sql = "INSERT INTO $this->table_pic (`user_id` , `picture_location`, `thumb_location`, `added_on`, `deleted`, `orig_name`,  `raw_name`)
				VALUES (".$this->db->escape($user_id).", ".$this->db->escape($image_name).", ".$this->db->escape($thumb).", NOW(), 0, ".$this->db->escape($orig).", ".$this->db->escape($raw).")";
		
		$this->db->query($sql);
		
		return $this->db->insert_id();
	}
	
	public function delete_picture($id)
	{
		$sql = "UPDATE pictures SET deleted = 1 WHERE id = " . $this->db->escape($id). " AND user_id = " . $this->session->userdata('user_id');
		
		$this->db->query($sql);
	}
	
	public function default_picture($id)
	{
		$sql = "UPDATE pictures SET default_pic = 1 WHERE id = " . $this->db->escape($id) . " AND user_id = " . $this->session->userdata('user_id');
		
		$sql2 = "UPDATE pictures SET default_pic = 0 WHERE id NOT IN ( " . $this->db->escape($id) . " ) AND user_id = " . $this->session->userdata('user_id');
		
		$this->db->query($sql);
		$this->db->query($sql2);
	}
	
	public function get_pictures($user_id)
	{
		if(!$user_id)
			$user_id = $this->get_profile_id();
			
		$pictures = array();
		//var_dump($user_id); die;
		$query = $this->db->query("SELECT * FROM pictures WHERE user_id = $user_id AND deleted = 0");
		
		foreach ($query->result() as $row)
		{
			$pictures[] = $row;			
		}
		
		return $pictures;
	}
	
	public function get_photo($picture_id)
	{
		$query = $this->db->query("SELECT picture_location FROM pictures WHERE id = ". $this->db->escape($picture_id));
			
		$row = $query->row();
		
		return $row->picture_location;
	}
	
	private function get_profile_id()
	{
		$query = $this->db->query("SELECT profile_id FROM users WHERE pseudo = ". $this->db->escape($this->session->userdata('pseudo')));
			
		$row = $query->row();
		
		return $row->profile_id;
	}
	
	public function get_user_pictures($profile_id)
	{
		$pictures = array();
		
		$query = $this->db->query("SELECT pic.id, pic.default_pic, pic.picture_location, pic.thumb_location FROM pictures pic WHERE user_id = $profile_id AND deleted = 0 AND approved = 1 ORDER BY added_on");
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$pictures[] = $row;			
			}
		} else {
			$pictures = new stdClass;
			
			$query = $this->db->query("SELECT sex FROM profile WHERE profile_id = ". $this->db->escape($profile_id));
			$row = $query->row();
			
			$pictures->sex = $row->sex;
			if($row->sex == 'f')
				$pictures->picture_location = 'woman.jpg';
			else
				$pictures->picture_location = 'man.jpg';
		}
		//var_dump($pictures); die;
		return $pictures;
	}
	
	public function get_unvalidated_photo()
	{
		if($this->input->post('action')) {
			if(!$this->session->userdata('id')) 
				$this->session->set_userdata('id', $this->input->post('id'));
			else $this->session->set_userdata('id', $this->input->post('id'));
			if($this->input->post('action') == 'next')
				$query = $this->db->query("SELECT pic.id, pic.picture_location, p.sex, u.pseudo FROM pictures pic LEFT JOIN profile p ON p.profile_id = pic.user_id LEFT JOIN users u ON u.profile_id = p.profile_id WHERE id > " . $this->db->escape($this->session->userdata('id')) . " AND deleted = 0 AND approved = 0 ORDER BY id ASC LIMIT 1");
		
			//$this->session->set_userdata('id', $this->input->post('id'));
		} else
			$query = $this->db->query("SELECT pic.id, pic.picture_location, p.sex, u.pseudo FROM pictures pic LEFT JOIN profile p ON p.profile_id = pic.user_id LEFT JOIN users u ON u.profile_id = p.profile_id WHERE deleted = 0 AND approved = 0 ORDER BY id ASC LIMIT 1");
		
		$row = $query->row();
		
		return $row;
	}
	
	public function validate_photo($id)
	{
		if($this->input->post('action'))
			return false;
			
		$sql = "UPDATE pictures SET approved = 1,  `approved_on` = NOW( ), `approved_by` = ". $this->db->escape($this->session->userdata('pseudo')) . "  WHERE id = " . $this->db->escape($id);
		
		$this->db->query($sql);
	}
	
	public function get_age($birthdate) // USELESS ...
	{
		$date = explode("-", $birthdate);
		$tdate = date('Y');
		$age = $tdate - $date[0];
		return $age;
	}
	
	public function get_zodiac($date_naissance) 
	{ 
		$date_naissance; #date au format AAAA-MM-JJ (MySQL)
		$mois_jour = substr($date_naissance, 5, 2).substr($date_naissance, 8, 2); 
		$tab_date_signe = array( 
								'0120' => 'Capricorne', 
								'0218' => 'Verseau', 
								'0320' => 'Poisson', 
								'0420' => 'Belier', 
								'0521' => 'Taureau', 
								'0621' => 'Gemeaux', 
								'0722' => 'Cancer', 
								'0822' => 'Lion', 
								'0922' => 'Vierge', 
								'1022' => 'Balance', 
								'1122' => 'Scorpion', 
								'1221' => 'Sagittaire', 
								'1300' => 'Capricorne', 
								); 

		foreach ($tab_date_signe as $cle => $valeur) 
		{ 
			if ($mois_jour <= $cle) 
			{ 
				return $valeur; 
			} 
		}
		return false;
	}
	
	public function get_profile($pseudo)
	{
		$query = $this->db->query("SELECT users.*, p.*, 
									COALESCE( (SELECT picture_location FROM pictures WHERE user_id = (SELECT profile_id FROM users WHERE pseudo = ". $this->db->escape($pseudo) .") AND default_pic = 1 LIMIT 1), 
											(SELECT picture_location FROM pictures WHERE user_id = (SELECT profile_id FROM users WHERE pseudo = ". $this->db->escape($pseudo) .") ORDER BY id ASC LIMIT 1)) AS default_pic, 
										pic.picture_location, MONTHNAME(users.registered_on) AS month_reg, YEAR(users.registered_on) AS year_reg, pic.id AS picture_id FROM users 
									LEFT JOIN profile p ON p.profile_id = users.profile_id 
									LEFT JOIN pictures pic ON pic.user_id = p.profile_id
									WHERE users.pseudo = ". $this->db->escape($pseudo) ." 
									GROUP BY users.pseudo ORDER BY pic.default_pic DESC LIMIT 1");
		
		return $query->row();
	}
	
	public function get_new_members($gender = NULL)
	{
		$members = array();
		
		if($gender == '')
			$qy = "";
		else if($gender == 'men')
			$qy = " AND sex = 'm' ";
		else if($gender == 'women')
			$qy = " AND sex = 'f' ";
			
		$query = $this->db->query("SELECT u.pseudo, p.title, p.sex, YEAR(CURDATE()) - YEAR(p.birthdate) AS age, pic.approved, 
											p.town, p.country, p.civil_status, p.looking_for, p.sexuality, p.description, p.region, 
											pic.thumb_location, pic.default_pic 
									FROM users u 
									LEFT JOIN profile p ON p.profile_id = u.profile_id 
									LEFT JOIN pictures pic ON pic.user_id = p.profile_id  
									WHERE u.activated = 1 AND pic.approved = 1 AND  pic.deleted = 0 $qy
									GROUP BY u.pseudo  
									ORDER BY p.profile_id DESC 
									");
		
		foreach ($query->result() as $row)
		{
			$members[] = $row;			
		}
		
		return $members;
	}
	
	public function get_home_members()
	{
		$members = array();
		
		$query = $this->db->query("SELECT u.pseudo, p.title, p.sex, YEAR(CURDATE()) - YEAR(p.birthdate) AS age, p.profile_id, 
											p.town, p.country, p.civil_status, p.looking_for, p.sexuality, p.description, p.region 
									FROM users u 
									LEFT JOIN profile p ON p.profile_id = u.profile_id      
									WHERE u.activated = 1 
									GROUP BY u.pseudo  
									ORDER BY u.last_activity DESC 
									");
		
		foreach ($query->result() as $row)
		{
			
			$im = "SELECT id, user_id, default_pic, approved, thumb_location 
												FROM pictures WHERE deleted = 0 AND approved = 1 AND user_id = ". $this->db->escape($row->profile_id)." ORDER BY default_pic DESC 
												LIMIT 1";
			$qu = $this->db->query($im);
			
			$image = $qu->row();
			$row->thumb_location = $image->thumb_location;
			$members[] = $row;
		}
		
		return $members;
	}
	
	public function get_connected_members()
	{
		$members = array();
		
		$query = $this->db->query("SELECT u.pseudo, p.title, p.sex, YEAR(CURDATE()) - YEAR(p.birthdate) AS age, pic.approved, 
											p.town, p.country, p.civil_status, p.looking_for, p.sexuality, p.description, p.region, 
											pic.thumb_location, pic.default_pic 
									FROM users u 
									LEFT JOIN profile p ON p.profile_id = u.profile_id 
									LEFT JOIN pictures pic ON pic.user_id = p.profile_id  
									WHERE u.activated = 1 AND pic.approved = 1 AND  pic.deleted = 0 AND u.last_activity BETWEEN timestamp(DATE_SUB(NOW(), INTERVAL 30 MINUTE)) AND timestamp(NOW())
									GROUP BY u.pseudo  
									ORDER BY u.last_activity DESC 
									");
		
		foreach ($query->result() as $row)
		{
			$members[] = $row;			
		}
		
		return $members;
	}
	
	public function increase_view_profile($id)
	{
		if($this->session->userdata($id))
			return false;
		$sql = "UPDATE profile SET views = (views + 1) WHERE profile_id = " . $this->db->escape($id);
		$this->session->set_userdata($id, 1);
		$this->db->query($sql);
	}
	
	public function check_session()
	{
		if($this->session->userdata('connected') == 1)
			return true;
		
		return false;
	}
	
	public function get_user_country()
	{
		$sql = 'SELECT 
	            c.country, c.country_fr  
	        FROM 
	            ip2nationCountries c,
	            ip2nation i 
	        WHERE 
	            i.ip < INET_ATON("'.$this->input->server('REMOTE_ADDR').'") 
	            AND 
	            c.code = i.country 
	        ORDER BY 
	            i.ip DESC 
	        LIMIT 0,1';
		
		$query = $this->db->query($sql);
		
		$row = $query->row();
		
		if($row->country_fr != '')
			$row->country = $row->country_fr;
	
		return $row->country;
	}
}
