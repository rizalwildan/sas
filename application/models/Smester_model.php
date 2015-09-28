<?php
	//File kelas_model.php
	class Smester_model extends CI_Model  {
		function __construct()
		{
		 parent::__construct();
		}

    public function insert_smester($data)
    {
      $this->db->insert('tahun', $data);
    }

}
