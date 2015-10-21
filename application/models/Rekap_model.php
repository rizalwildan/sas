<?php
	/**
	*
	*/
	class Rekap_model extends CI_Model
	{

		// Rekap per kelas
		public function getKelas()
		{
			$data = $this->db->query("SELECT * FROM kelas");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getSPP($jeniskelas)
		{
			$data = $this->db->query("SELECT sum(iuran) AS jumlah FROM view_komponenperkelas WHERE jenis_kelas='$jeniskelas'");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		public function getSPPPerBulan($jeniskelas,$bulan)
		{
			$data = $this->db->query("SELECT sum(iuran) AS jumlah FROM view_komponenperkelas WHERE jenis_kelas='$jeniskelas' AND periode='$bulan'");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		// End Rekap per kelas


		// Rekap per siswa
		public function getSiswa()
		{
			$data = $this->db->query("SELECT nim, namasiswa, jenis_kelas FROM view_siswa_sudah_punya_kelas");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		


		





		public function daftarSiswa()
		{
			$data = $this->db->query("SELECT * FROM spp GROUP BY nim ");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getStatus($nim, $bulan)
		{
			$data = $this->db->query("SELECT * FROM spp WHERE nim='$nim' AND periode='$bulan'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->nominalspp;
				}
			}

			return $kirimData;
		}

		public function totalSPPByNim($nim)
		{
			$data = $this->db->query("SELECT sum(nominalspp) as jumlah FROM spp WHERE nim='$nim'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		// End Rekap per siswa

	}