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
			$sql = "SELECT * from komponen";
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
					$kirimData[$index] = array('idkomponen' => $dataKomponen->idkomponen,
						'nama_komp'=>$dataKomponen->nama_komp,
						'deskripsi'=>$dataKomponen->deskripsi,
						'iuran'=>$dataKomponen->iuran
						);
					$index++;
				}
			}
			return $kirimData;
		}

		public function update_komponen($updateKomponen)
		{
			$this->db->where('idkomponen',$updateKomponen['idkomponen']);
			$this->db->update('komponen',$updateKomponen);
		}

		public function insert_komponen_setting($jeniskelas,$idkomponen,$idtahun,$periode)
		{
			$sql= "INSERT into spp_setting (jenis_kelas,idkomponen,idtahun,periode) values ($jeniskelas,$idkomponen,$idtahun,'$periode')";
			$this->db->query($sql);
		}

		public function delete_komponen($idkomponen)
		{
			$this->db->WHERE('idkomponen', $idkomponen);
			$this->db->delete('komponen', $idkomponen);
		}


		// admin transaksi

		public function getTahunAjaranSekarang(){
			$data = $this->db->query("SELECT tahun_pelajaran FROM tahun WHERE idtahun=(SELECT max(idtahun) FROM tahun)");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				foreach ($data->result() as $key) {
				$kirimData = $key->tahun_pelajaran;
				}
			}

			return $kirimData;
		}

		public function getAllSiswa(){
			$query = "SELECT * FROM view_siswa_sudah_punya_kelas, cek_smester WHERE view_siswa_sudah_punya_kelas.tahun_pelajaran = cek_smester.tahun_pelajaran
			 ORDER BY namakelas";
			$data = $this->db->query($query);

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
			$data = $this->db->query("SELECT * FROM kelas ORDER BY idkelas");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getSiswaByNim($nim, $tahun)
		{
			$data = $this->db->query("SELECT * FROM view_siswa_sudah_punya_kelas WHERE nim='$nim' AND tahun_pelajaran = '$tahun'");

			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getKomponenByBulan($bulan,$tahun,$kelas)
		{
			// $data = $ths->db->query("SELECT * FROM view_komponenperkelas WHERE jenis_kelas='$kelas' AND tahun_pelajaran='$tahun' AND periode='$bulan'");
			$data = $this->db->query("SELECT * FROM view_komponenperkelas WHERE jenis_kelas='$kelas' AND tahun_pelajaran='$tahun' AND periode='$bulan'");
			if($data->num_rows() < 1 ){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

	}
?>
