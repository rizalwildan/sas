<?php
	class Pesan_model extends CI_Model  {
		function __construct()
		{
		 parent::__construct();
		}

    public function cek_no($bulan)
    {
			$index=1;
      $query = "SELECT nama_siswa, no_hp_wali FROM `siswa` WHERE id_siswa NOT IN (SELECT id_siswa FROM spp WHERE periode='$bulan')";
      $data = $this->db->query($query);

			foreach ($data->result() as $row) {
				$kirimData['no'][$index] = $row->no_hp_wali;
				$index++;
			}
			$kirimData['banyak'] = $data->num_rows();
			return $kirimData;
		}

		public function sendMessage($dest1, $date, $pesan)
		{
			$data = array(
			'InsertIntoDB' => date('Y-m-d H:i:s'),
			'SendingDateTime' => $date,
			'DestinationNumber' => $dest1,
			'Coding' => 'Default_No_Compression',
			'TextDecoded' => $pesan,
			'CreatorId' => ' '
			);
		 $this->db->insert('outbox', $data);
		}

		public function insertOutbox($dest, $pesan, $date, $jumlah)
	{
		$data = array(
			'InsertIntoDB' => date('Y-m-d H:i:s'),
			'SendingDateTime' => $date,
			'DestinationNumber' => $dest,
			'MultiPart' => 'true',
			'UDH' => '050003D3'. $jumlah . '01',
			'Coding' => 'Default_No_Compression',
			'TextDecoded' => $pesan,
			'CreatorId' => 'long'
			);
		$this->db->insert('outbox', $data);
	}

	public function getLastOutboxID()
	{
		$sql = "SELECT max(ID) as value FROM outbox";
		return $this->db->query($sql);
	}

	public function insertOutboxMultipart($outboxid, $pesan, $pos, $jumlah)
	{
		$code = $pos+1;
		$data = array(
			'ID' => $outboxid,
			'UDH' => '050003D3'. $jumlah . '0' . $code,
			'SequencePosition' => $code,
			'Coding' => 'Default_No_Compression',
			'TextDecoded' => $pesan,
			);
		$this->db->insert('outbox_multipart', $data);
	}

	public function getInbox()
	{
		$this->db->order_by('ReceivingDateTime', 'DESC');
		return $this->db->get('inbox');
	}

	public function getOutbox()
	{
		$this->db->order_by('SendingDateTime', 'DESC');
		return $this->db->get('outbox');
	}

	public function getSent()
	{
		$this->db->order_by('SendingDateTime', 'DESC');
		return $this->db->get('sentitems');
	}

  }
