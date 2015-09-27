<?php
	//File kelas_model.php
	class kelas_model extends CI_Model  {
		function __construct() 
		{
		 parent::__construct(); 
		} 

	public function getData()
	{
		$sql = "SELECT * FROM kelas";
		return $this->db->query($sql);
	}

	public function jenis_kelas(){
		$sql = "SELECT distinct jenis_kelas from kelas";
		return $this->db->query($sql);
	}

	function tambah($kelas)
	{
		
		$sql = "INSERT INTO kelas (namakelas) VALUES ('$kelas')";
		$this->db->query($sql);
	}
	
	public function tampil_siswa_kelas()
	{
		$sql = "SELECT * FROM siswa_belum_dapat_kelas";
		$data = $this->db->query($sql);

		if($data->num_rows()>0)
		{
			$index = 1;
			foreach ($data->result() as $tampil)
			{
				$dataSiswa[$index] = array(
					'idsiswa' => $tampil->idsiswa,
					'nim' => $tampil->nim,
					'namasiswa' => $tampil->namasiswa
					);
				$index++;
			}
		}
		else
		{
			$dataSiswa = 'kosong';
		}
		return $dataSiswa;
	}

	public function input_kelas_siswa($nis, $kelas, $tahun)
	{
		$sql= "INSERT INTO siswa_kelas (idsiswa,idkelas,idtahun) VALUES ($nis, $kelas, $tahun)";
		$this->db->query($sql);
	}
}