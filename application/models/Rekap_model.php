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
			$query = "SELECT * FROM view_siswa_sudah_punya_kelas, cek_smester WHERE namakelas='$kelas' AND view_siswa_sudah_punya_kelas.tahun_pelajaran = cek_smester.tahun_pelajaran
			 GROUP BY nim ";
			$data = $this->db->query($query);

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		//Mengambil Status Pembayaran Dari NIM perkelas
		public function getstatuskelas($nim, $bulan, $tahun_pelajaran)
		{
			$data = $this->db->query("SELECT * FROM spp WHERE nim='$nim' AND periode='$bulan' AND tahun = '$tahun_pelajaran'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->nominalspp;
				}
			}

			return $kirimData;
		}

		public function daftarKelas()
		{
			$data = $this->db->query("SELECT * FROM kelas GROUP BY namakelas ");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function daftarKelasByJenis($jenis_kelas)
		{
			$data = $this->db->query("SELECT * FROM kelas WHERE jenis_kelas = '$jenis_kelas' GROUP BY namakelas ");

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function daftarSiswa()
		{
			$query = "SELECT * FROM view_siswa_sudah_punya_kelas, cek_smester WHERE view_siswa_sudah_punya_kelas.tahun_pelajaran = cek_smester.tahun_pelajaran
			 GROUP BY nim ";
			$data = $this->db->query($query);

			if($data->num_rows() < 1){
				$kirimData = "kosong";
			}else{
				$kirimData = $data->result_array();
			}

			return $kirimData;
		}

		public function getStatus($nim, $bulan, $tahun_pelajaran)
		{
			$data = $this->db->query("SELECT * FROM spp WHERE nim='$nim' AND periode='$bulan' AND tahun = '$tahun_pelajaran'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->nominalspp;
				}
			}

			return $kirimData;
		}

		public function getBos($nim, $bulan)
		{
			$query = "SELECT * FROM spp, cek_smester WHERE nim='$nim' AND periode='$bulan' AND spp.tahun = cek_smester.tahun_pelajaran";
			$data = $this->db->query($query);

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->danabos;
				}
			}

			return $kirimData;
		}

		public function totalSPPByNim($nim, $tahun_pelajaran)
		{
			$data = $this->db->query("SELECT sum(nominalspp) as jumlah FROM spp WHERE nim='$nim' AND tahun='$tahun_pelajaran'");

			if($data->num_rows() < 1){
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		public function totalSppKelas($namakelas, $bulan)
		{
			$query = "SELECT nominalspp * count(nim) as jumlah FROM spp, cek_smester WHERE namakelas='$namakelas' AND periode='$bulan' 
			AND spp.tahun = cek_smester.tahun_pelajaran";
			$data = $this->db->query($query);

			if ($data->num_rows() < 1) {
				$kirimData = 0;
			}else{
				foreach ($data->result() as $key) {
					$kirimData = $key->jumlah;
				}
			}

			return $kirimData;
		}

		public function totalSppKelasPerBulan($jenis_kelas, $bulan)
		{
			$query = "SELECT sum(nominalspp) as jumlah FROM spp, cek_smester WHERE jeniskelas='$jenis_kelas' AND periode='$bulan' 
				AND spp.tahun = cek_smester.tahun_pelajaran";
			$data = $this->db->query($query);

			if ($data->num_rows() < 1) {
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
			$query = "SELECT sum(danabos) as jumlah FROM spp, cek_smester WHERE nim='$nim' AND spp.tahun = cek_smester.tahun_pelajaran";
			$data = $this->db->query($query);

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
