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
			$data = $this->db->query("SELECT nim, namasiswa, jenis_kelas, namakelas FROM view_siswa_sudah_punya_kelas");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}


		//Mengambil NIM berdasarkan kelas
		public function daftarSiswaByKelas($kelas)
		{
			$data = $this->db->query("SELECT * FROM spp WHERE namakelas='$kelas' GROUP BY nim ");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		//Mengambil Status Pembayaran Dari NIM perkelas
		public function getstatuskelas($id_siswa, $bulan)
		{
			$data = $this->db->query("SELECT * FROM view_spp WHERE id_siswa='$id_siswa' AND periode='$bulan'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->nominal_spp;
				}
			}

			return $kirimData;
		}

		public function filter_rekap($kelas, $tahun)
		{
			$this->db->WHERE('id_kelas', $kelas);
			$this->db->WHERE('nama_tahun_pelajaran', $tahun);
			$data = $this->db->get('view_siswa_sudah_dapat_kelas');

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else {
				$kirimData = $data->result_array();
			}
			return $kirimData;
		}

		public function print_rekap($isi)
		{
			$this->db->WHERE('id_kelas', $isi['namakelas']);
			$this->db->WHERE('nama_tahun_pelajaran', $isi['tahun']);
			$data = $this->db->get('view_siswa_sudah_dapat_kelas');

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else {
				$kirimData = $data->result_array();
			}
			return $kirimData;
		}

		public function daftarSiswa()
		{
			$data = $this->db->query("SELECT * FROM view_siswa_sudah_dapat_kelas GROUP BY id_siswa ");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getStatus($id_siswa, $bulan)
		{
			$data = $this->db->query("SELECT * FROM view_spp WHERE id_siswa='$id_siswa' AND periode='$bulan'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->nominal_spp;
				}
			}

			return $kirimData;
		}

		public function getBos($nim, $bulan)
		{
			$data = $this->db->query("SELECT * FROM spp WHERE nim='$nim' AND periode='$bulan'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->danabos;
				}
			}

			return $kirimData;
		}

		public function totalSPPByNim($id_siswa)
		{
			$data = $this->db->query("SELECT sum(nominal_spp) as jumlah FROM view_spp WHERE id_siswa='$id_siswa'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		public function totalBosByNim($nim)
		{
			$data = $this->db->query("SELECT sum(danabos) as jumlah FROM spp WHERE nim='$nim'");

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

		public function edit_rekap($data)
		{
			$this->db->WHERE('nim', $data['nim']);
			$this->db->WHERE('periode', $data['periode']);
			$this->db->update('spp', $data);
		}

	}
