<?php
	/**
	* 
	*/
	class Siswa_model extends CI_Model
	{
		public function cekSmester()
		{
			$semesterIni = $this->db->get('cek_smester');
			if ($semesterIni->num_rows() > 0) 
			{
				$index = 1;
				foreach ($semesterIni->result() as $row) 
				{
					$dataSmester[$index] = array('idtahun' => $row->idtahun, 'tahun_pelajaran' => $row->tahun_pelajaran);
					$index++;
				}
			}
			else
			{
				$dataSmester = 'kosong';
			}

			return $dataSmester;
		}
		
		public function tampilSiswaall()
		{
			$sql = "SELECT * FROM siswa_sudah_punya_kelas";
			$data = $this->db->query($sql);
			$index =1;
			if ($data->num_rows()<1) 
			{
				$kirimData = "kosong";
			}
			else
			{
				foreach ($data->result() as $dataSiswa) 
				{
					$kirimData[$index] = array('idsiswa' => $dataSiswa->idsiswa,
						'nim' => $dataSiswa->nim,
						'namasiswa' => $dataSiswa->namasiswa,
						'namakelas' => $dataSiswa->namakelas,
						'alamat' => $dataSiswa->alamat,
						'namawali' => $dataSiswa->namawali,
						'tmlahir' => $dataSiswa->tmlahir,
						'tgllahir' => $dataSiswa->tgllahir,
						'gender' => $dataSiswa->gender
						);
					$index++;
				}
			}
			return $kirimData;
		}

		public function detail_siswa($dataSis)
		{
			$sql = "SELECT nim, namasiswa, gender, alamat, tmlahir, tgllahir, namawali, tahun.tahun_pelajaran 
					FROM siswa, tahun 
					WHERE idsiswa = '$dataSis' AND siswa.idtahun = tahun.idtahun ";
			$data = $this->db->query($sql);

			foreach ($data->result() as $detail) 
			{
				$isi = array('nim' => $detail->nim,
					'namasiswa' => $detail->namasiswa,
					'gender' => $detail->gender,
					'alamat' => $detail->alamat,
					'tmlahir' => $detail->tmlahir,
					'tgllahir' => $detail->tgllahir,
					'namawali' => $detail->namawali,
					'tahun_pelajaran' => $detail->tahun_pelajaran
					);
			}

			return $isi;
			redirect(base_url().'welcome/detailsiswa');
			
		}

		public function update_siswa($datasiswa, $dataSiswaKelas)
		{
			$this->db->where('idsiswa', $datasiswa['idsiswa']);
			$this->db->update('siswa', $datasiswa);

			$this->db->where('idsiswa', $datasiswa['idsiswa']);
			$this->db->where('idtahun', $dataSiswaKelas['idtahun']);
			$this->db->update('siswa_kelas', $dataSiswaKelas);


			redirect(base_url().'index.php/home/index');
		}
	}
?>