<?php
	//File kelas_model.php
	class login_model extends CI_Model  {
		function __construct() 
		{
		 parent::__construct(); 
		} 

	public function cek_user($username, $password)
	{
		$sql = 'SELECT * FROM user where username="'.$username.'" AND password="'.$password.'";';
		$hasil = $this->db->query($sql);
		if ($hasil->num_rows() == 1) {
			foreach($hasil->result() as $ses)
			{
				$data = array('username' => $ses->username, 'login' => TRUE, 'level' => $ses->idlevel );
				$this->session->set_userdata('akun',$data);
			}
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}