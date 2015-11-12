<?php
	/**
	*
	*/
	class Siswa_model extends CI_Model
	{
		public function cekSmester()
		{
			$semesterIni = $this->db->get('cek_tahun_pelajaran');
			if ($semesterIni->num_rows() > 0)
			{
				$index = 1;
				foreach ($semesterIni->result() as $row)
				{
					$dataSmester[$index] = array('id_tahun' => $row->id_tahun,
					'nama_tahun_pelajaran' => $row->nama_tahun_pelajaran);
					$index++;
				}
			}
			else
			{
				$dataSmester = 'kosong';
			}

			return $dataSmester;
		}

		public function getDataTahun()
		{
			$this->db->order_by('nama_tahun_pelajaran', 'DESC');
			return $this->db->get('tahun_pelajaran');
		}

		public function insert_siswa($kelas)
		{
			$sql = "INSERT INTO siswa_kelas VALUES('',(SELECT id_siswa FROM siswa ORDER BY id_siswa DESC LIMIT 1),$kelas,(SELECT id_tahun FROM cek_tahun_pelajaran))";
			$this->db->query($sql);
		}

		public function tampilSiswaall()
		{
			$this->db->order_by("nama_kelas", "ASC");
			$data = $this->db->get("view_siswa_sudah_dapat_kelas");

			$index =1;
			if ($data->num_rows()<1)
			{
				$kirimData = "kosong";
			}
			else
			{
				foreach ($data->result() as $dataSiswa)
				{
					$kirimData[$index] = array('id_siswa' => $dataSiswa->id_siswa,
						'nis' => $dataSiswa->nis,
						'nama_siswa' => $dataSiswa->nama_siswa,
						'nama_kelas' => $dataSiswa->nama_kelas,
						'alamat' => $dataSiswa->alamat,
						'nama_wali' => $dataSiswa->nama_wali,
						'tempat_lahir' => $dataSiswa->tempat_lahir,
						'tgl_lahir' => $dataSiswa->tgl_lahir,
						'gender' => $dataSiswa->gender,
						'nohp' => $dataSiswa->no_hp_wali
						);
					$index++;
				}
			}
			return $kirimData;
		}

		public function count_data()
		{
			return $this->db->count_all("view_siswa_sudah_punya_kelas");
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
					'namawali' => $detail->namawali
					);
			}

			return $isi;

		}

		public function update_siswa($datasiswa, $dataSiswaKelas)
		{
			$this->db->where('id_siswa', $datasiswa['id_siswa']);
			$this->db->update('siswa', $datasiswa);

			$this->db->where('id_siswa', $datasiswa['id_siswa']);
			$this->db->where('id_tahun', $dataSiswaKelas['id_tahun']);
			$this->db->update('siswa_kelas', $dataSiswaKelas);
		}

		public function delete($idsiswa)
		{
			$this->db->where('id_siswa', $idsiswa);
			$this->db->delete('siswa');

			$this->db->where('id_siswa', $idsiswa);
			$this->db->delete('siswa_kelas');
		}

		public function insert_csv($insert_data)
		{
			$this->db->insert('siswa', $insert_data);
		}
	}
?>
