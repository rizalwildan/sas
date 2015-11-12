<?php
	/**
	*
	**/
	class Transaksi_model extends CI_Model
	{
		public function transaksi()
		{

		}

		public function getKomponen()
		{
			$sql = "SELECT * from komponen_pembayaran";
			$data = $this->db->query($sql);
			$index=1;
			if ($data->num_rows()<1)
			{
				$kirimData ="kosong";
			}
			else
			{
				foreach ($data->result() as $dataKomponen)
				{
					$kirimData[$index] = array('idkomponen' => $dataKomponen->id_komponen,
						'nama_komp'=>$dataKomponen->nama_komponen,
						'deskripsi'=>$dataKomponen->deskripsi_komponen,
						'iuran'=>$dataKomponen->iuran
						);
					$index++;
				}
			}
			return $kirimData;
		}

		public function update_komponen($updateKomponen)
		{
			$this->db->where('id_komponen',$updateKomponen['id_komponen']);
			$this->db->update('komponen_pembayaran',$updateKomponen);
		}

		public function insert_komponen_setting($jeniskelas,$idkomponen,$idtahun,$periode)
		{
			$sql= "INSERT into spp_setting (jenis_kelas,idkomponen,idtahun,periode) values ($jeniskelas,$idkomponen,$idtahun,'$periode')";
			$this->db->query($sql);
		}

		public function delete_komponen($idkomponen)
		{
			$this->db->WHERE('id_komponen', $idkomponen);
			$this->db->delete('komponen_pembayaran');
		}


		// admin transaksi

		public function getAllSiswa(){
			$data = $this->db->query("SELECT * FROM view_siswa_sudah_dapat_kelas ORDER BY nama_kelas");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getSiswaByKelas($namakelas)
		{
			$data = $this->db->query("SELECT * FROM view_siswa_sudah_punya_kelas WHERE namakelas='$namakelas'");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getAllKelas()
		{
			$data = $this->db->query("SELECT * FROM kelas ORDER BY id_kelas");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getSiswaById($idsiswa)
		{
			$data = $this->db->query("SELECT * FROM view_siswa_sudah_dapat_kelas WHERE id_siswa='$idsiswa'");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getKomponenByBulan($bulan,$idtahun,$jeniskelas)
		{
			// $data = $ths->db->query("SELECT * FROM view_komponenperkelas WHERE jenis_kelas='$kelas' AND tahun_pelajaran='$tahun' AND periode='$bulan'");
			$data = $this->db->query("SELECT * FROM view_komponenperkelas WHERE jenis_kelas='$jeniskelas' AND id_tahun='$idtahun' AND periode='$bulan'");
			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

	}
?>
