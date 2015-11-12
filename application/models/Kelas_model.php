<?php
	//File kelas_model.php
	class kelas_model extends CI_Model  {
		function __construct()
		{
		 parent::__construct();
		}

	public function getData()
	{
		$this->db->order_by("nama_kelas", "ASC");
		return $this->db->get("kelas");
	}

	public function count_data()
	{
		return $this->db->count_all("kelas");
	}

	public function jenis_kelas(){
		$sql = "SELECT distinct jenis_kelas from kelas";
		return $this->db->query($sql);
	}

	function tambah($kelas, $base)
	{

		$sql = "INSERT INTO kelas (nama_kelas, jenis_kelas) VALUES ('$kelas', '$base')";
		$this->db->query($sql);
	}

	public function tampil_siswa_kelas()
	{
		$sql = "SELECT * FROM view_siswa_belum_dapat_kelas";
		$data = $this->db->query($sql);

		if($data->num_rows()>0)
		{
			$index = 1;
			foreach ($data->result() as $tampil)
			{
				$dataSiswa[$index] = array(
					'idsiswa' => $tampil->id_siswa,
					'nim' => $tampil->nis,
					'namasiswa' => $tampil->nama_siswa
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
		$sql= "INSERT INTO siswa_kelas (id_siswa,id_kelas,id_tahun) VALUES ($nis, $kelas, $tahun)";
		$this->db->query($sql);
	}

	public function delete_kelas($idkelas)
		{
			$this->db->where('id_kelas', $idkelas);
			$this->db->delete('kelas');
		}
}
