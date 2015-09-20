<?php
	//File kelas_model.php
	class Login_model extends CI_Model  {
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

	public function tampil_user()
	{
		$sql = "SELECT*FROM tampil_user";
		$hasil = $this->db->query($sql);
		$index = 1;
		if($hasil->num_rows()<1)
		{
			$kirimData = "kosong";
		}
		else
		{
			foreach ($hasil->result() as $dataUser)
			{
				$kirimData[$index] = array('iduser' => $dataUser->iduser,
					'username' => $dataUser->username,
					'password' => $dataUser->password,
					'namalevel' => $dataUser->namalevel
					);
				$index++;
			}
		}
		return $kirimData;
	}

	public function edit_user($dataUser)
	{
		$this->db->where('iduser', $dataUser['iduser']);
		$preb = $this->db->update('user', $dataUser);

		if($preb == 1)
		{
			$this->session->set_flashdata('success', 'sukses input');
		}
		else
		{
			$this->session->set_flashdata('error', 'gagal input');
		}

		redirect(base_url().'Admin/user');
	}

}
