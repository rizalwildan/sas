<?php
	//File kelas_model.php
	class Smester_model extends CI_Model  {
		function __construct()
		{
		 parent::__construct();
		}

		public function getDataTahun()
		{
			$this->db->order_by('nama_tahun_pelajaran', 'DESC');
			return $this->db->get('tahun_pelajaran');
		}

    public function insert_smester($data)
    {
      $this->db->insert('tahun', $data);
    }

		public function edit_smester($data)
		{
			$this->db->WHERE('idtahun', $data['idtahun']);
			$this->db->update('tahun', $data);
		}

		public function delete_smester($idtahun)
		{
			$this->db->WHERE('idtahun', $idtahun);
			$this->db->delete('tahun');
		}

}
