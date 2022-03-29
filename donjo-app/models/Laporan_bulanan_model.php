<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File ini:
 *
 * Model untuk modul Statistik > Laporan Bulanan
 *
 * donjo-app/models/Laporan_bulanan_model.php
 *
 */

/**
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package	OpenSID
 * @author	Tim Pengembang OpenDesa
 * @copyright	Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright	Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license	http://www.gnu.org/licenses/gpl.html	GPL V3
 * @link 	https://github.com/OpenSID/OpenSID
 */

class Laporan_bulanan_model extends CI_Model {

	protected $awal;
	protected $lahir;
	protected $datang;
	protected $pindah;
	protected $mati;
	protected $hilang;

	public function __construct()
	{
		parent::__construct();
		$this->tulis_log_bulanan();
	}

	public function tulis_log_bulanan()
	{
		// Jangan tulis kalau sudah pernah di sesi ini
		if ($this->session->log_bulanan) return;

		// Jangan hitung keluarga yang tidak ada Kepala Keluarga
		// Anggap warganegara_id = 0, 1 atau 3 adalah WNI
		$sql = "SELECT
			(SELECT COUNT(id) FROM tweb_penduduk WHERE status_dasar =1) AS pend,
			(SELECT COUNT(id) FROM tweb_penduduk WHERE status_dasar =1 AND sex =1 AND warganegara_id <> 2) AS wni_lk,
			(SELECT COUNT(id) FROM tweb_penduduk WHERE status_dasar =1 AND sex =2 AND warganegara_id <> 2) AS wni_pr,
			(SELECT COUNT(id) FROM tweb_penduduk WHERE status_dasar =1 AND sex =1 AND warganegara_id = 2) AS wna_lk,
			(SELECT COUNT(id) FROM tweb_penduduk WHERE status_dasar =1 AND sex =2 AND warganegara_id = 2) AS wna_pr,
			(SELECT COUNT(p.id) FROM tweb_keluarga k
				LEFT JOIN tweb_penduduk p ON k.nik_kepala = p.id
				WHERE p.status_dasar = 1
					AND k.nik_kepala IS NOT NULL AND k.nik_kepala <> 0) AS kk,
			(SELECT COUNT(k.id) FROM tweb_keluarga k LEFT JOIN tweb_penduduk p ON k.nik_kepala = p.id
				WHERE p.sex = 1 AND p.status_dasar = 1) AS kk_lk,
			(SELECT COUNT(k.id) FROM tweb_keluarga k LEFT JOIN tweb_penduduk p ON k.nik_kepala = p.id
				WHERE p.sex = 2  AND p.status_dasar = 1) AS kk_pr";
		$query = $this->db->query($sql);
		$data = $query->row_array();

		$bln = date("m");
		$thn = date("Y");

		$sql = "SELECT * FROM log_bulanan WHERE month(tgl) = $bln AND year(tgl) = $thn";
		$query = $this->db->query($sql);
		$ada = $query->result_array();

		if (!$ada)
		{
			$this->db->insert('log_bulanan', $data);
		}
		else
		{
			$this->db
					->where("month(tgl) = $bln AND year(tgl) = $thn")
					->update('log_bulanan', $data);
		}
		$this->session->log_bulanan = true;
	}

	private function dusun_sql()
	{
		$dusun = $_SESSION['dusun'];
		if ( ! empty($dusun))
		{
			return " AND dusun = '" .$dusun. "'";
		}
	}

	public function list_data()
	{
		$sql = "select c.id as id_cluster,c.rt,c.rw,c.dusun as dusunnya,
			(select count(id) from penduduk_hidup where sex='1' and id_cluster=c.id) as L,
			(select count(id) from penduduk_hidup where sex='2' and id_cluster=c.id) as P,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)<1 and id_cluster=c.id ) as bayi,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)>=1 and (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)<=5  and id_cluster=c.id ) as balita,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)>=6 and (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)<=12  and id_cluster=c.id ) as sd,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)>=13 and (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)<=15  and id_cluster=c.id ) as smp,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)>=16 and (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)<=18  and id_cluster=c.id ) as sma,
			(select count(id) from penduduk_hidup where (DATE_FORMAT( FROM_DAYS( TO_DAYS(NOW()) - TO_DAYS( tanggallahir ) ) , '%Y' ) +0)>60 and id_cluster=c.id ) as lansia,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id in (1,2,3,4,5,6)) as cacat,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='1') as cacat_fisik,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='2') as cacat_netra,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='3') as cacat_rungu,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='4') as cacat_mental,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='5') as cacat_fisik_mental,
			(select count(id) from penduduk_hidup where id_cluster=c.id and cacat_id='6') as cacat_lainnya,
			(select count(id) from penduduk_hidup where id_cluster=c.id and (cacat_id IS NULL OR cacat_id='7')) as tidak_cacat,
			(select count(id) from penduduk_hidup where sakit_menahun_id is not null and sakit_menahun_id <>'0' and sakit_menahun_id <>'14' and id_cluster=c.id and sex='1') as sakit_L,
			(select count(id) from penduduk_hidup where sakit_menahun_id is not null and sakit_menahun_id <>'0' and sakit_menahun_id <>'14' and id_cluster=c.id and sex='2') as sakit_P,
			(select count(id) from penduduk_hidup where hamil='1' and id_cluster=c.id) as hamil
			from  tweb_wil_clusterdesa c WHERE rw<>'0' AND rt<>'0' AND (select count(id) from tweb_penduduk where id_cluster=c.id)>0 ";

		$sql .= $this->dusun_sql();
		$sql .= " ORDER BY c.dusun,c.rw,c.rt ";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		//	$data = null;
		//Formating Output
		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $i + 1;
			$data[$i]['tabel'] = $data[$i]['rt'];
		}
		return $data;
	}

	/* KETERANGAN kode_peristiwa di log_penduduk
	   1 = insert penduduk baru dengan status lahir
	   2 = penduduk mati
		 3 = penduduk pindah keluar
		 4 = penduduk hilang
		 5 = insert penduduk baru pindah masuk
		 6 = penduduk tidak tetap pergi
	*/

	public function penduduk_awal($rincian = NULL, $tipe = NULL)
	{
		// Jika rincian dan tipe di definisikan, maka akan masuk kedetil laporan
		if ($rincian && $tipe)
		{
			return $this->rincian_awal($tipe);
		}

		$bln = $this->session->bulanku;
		$thn = $this->session->tahunku;
		$pad_bln = str_pad($bln, 2, '0', STR_PAD_LEFT); // Untuk membandingkan dengan tgl mysql

		// Perubahan penduduk sebelum bulan laporan
		$this->db
			->select('p.*, l.kode_peristiwa, lk.id_peristiwa as lk_id_peristiwa')
			->from('log_penduduk l')
			->join('tweb_penduduk p', 'l.id_pend = p.id')
			->join('log_keluarga lk', 'lk.id_kk = p.id_kk', 'left')
			->where("DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}'");
		$penduduk_mutasi_sql = $this->db->get_compiled_select();

		$penduduk_mutasi = $this->db
			->select('sum(case when sex = 1 and warganegara_id <> 2 and kode_peristiwa in (1,5) then 1 else 0 end) AS WNI_L_PLUS')
			->select('sum(case when sex = 2 and warganegara_id <> 2 and kode_peristiwa in (1,5) then 1 else 0 end) AS WNI_P_PLUS')
			->select('sum(case when sex = 1 and warganegara_id = 2 and kode_peristiwa in (1,5) then 1 else 0 end) AS WNA_L_PLUS')
			->select('sum(case when sex = 2 and warganegara_id = 2 and kode_peristiwa in (1,5) then 1 else 0 end) AS WNA_P_PLUS')
			->select('sum(case when sex = 1 and warganegara_id <> 2 and kode_peristiwa in (2, 3, 4) then 1 else 0 end) AS WNI_L_MINUS')
			->select('sum(case when sex = 2 and warganegara_id <> 2 and kode_peristiwa in (2, 3, 4) then 1 else 0 end) AS WNI_P_MINUS')
			->select('sum(case when sex = 1 and warganegara_id = 2 and kode_peristiwa in (2, 3, 4) then 1 else 0 end) AS WNA_L_MINUS')
			->select('sum(case when sex = 2 and warganegara_id = 2 and kode_peristiwa in (2, 3, 4) then 1 else 0 end) AS WNA_P_MINUS')
			->from('('.$penduduk_mutasi_sql.') as m')
			->get()
			->row_array();

		// Perubahan keluarga sebelum bulan laporan
		$this->db
			->select('p.*, l.id_peristiwa')
			->from('log_keluarga l')
			->join('tweb_keluarga k', 'k.id = l.id_kk')
			->join('tweb_penduduk p', 'p.id = k.nik_kepala')
			->where("DATE_FORMAT(l.tgl_peristiwa, '%Y-%m') < '{$thn}-{$pad_bln}'");
		$keluarga_mutasi_sql = $this->db->get_compiled_select();

		$keluarga_mutasi = $this->db
			->select('sum(case when id_peristiwa = 1 then 1 else 0 end) AS KK_PLUS')
			->select('sum(case when sex = 1 and id_peristiwa = 1 then 1 else 0 end) AS KK_L_PLUS')
			->select('sum(case when sex = 2 and id_peristiwa = 1 then 1 else 0 end) AS KK_P_PLUS')
			->select('sum(case when id_peristiwa in (2, 3, 4) then 1 else 0 end) AS KK_MINUS')
			->select('sum(case when sex = 1 and id_peristiwa in (2, 3, 4) then 1 else 0 end) AS KK_L_MINUS')
			->select('sum(case when sex = 2 and id_peristiwa in (2, 3, 4) then 1 else 0 end) AS KK_P_MINUS')
			->from('('.$keluarga_mutasi_sql.') as m')
			->get()
			->row_array();

		$penduduk_mutasi = array_merge($penduduk_mutasi, $keluarga_mutasi);

		$data = [];
		$kategori = ['WNI_L', 'WNI_P', 'WNA_L', 'WNA_P', 'KK', 'KK_L', 'KK_P'];
		foreach ($kategori as $k)
		{
			$data[$k] = $penduduk_mutasi[$k.'_PLUS'] - $penduduk_mutasi[$k.'_MINUS'];
		}
		$data['tahun'] = $thn;
		$data['bulan'] = $bln;

		$this->awal = $data;
		return $this->awal;
	}

	private function rincian_awal($tipe)
	{
		$penduduk = ['wni_l', 'wni_p', 'wna_l', 'wna_p', 'jml', 'jml_l', 'jml_p'];
		$keluarga = ['kk', 'kk_l', 'kk_p'];
		$bln = $this->session->bulanku;
		$thn = $this->session->tahunku;
		$pad_bln = str_pad($bln, 2, '0', STR_PAD_LEFT); // Untuk membandingkan dengan tgl mysql

		switch (true)
		{
			case (in_array($tipe, $penduduk)):
				// Perubahan penduduk sebelum bulan laporan
				$this->db
					->select('p.*, l.kode_peristiwa')
					->from('log_penduduk l')
					->join('tweb_penduduk p', 'l.id_pend = p.id')
					->where("DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}'");
				break;
			case (in_array($tipe, $keluarga)):
				// Perubahan penduduk sebelum bulan laporan
				$this->db
					->select('p.*, l.id_peristiwa')
					->from('log_keluarga l')
					->join('tweb_keluarga k', 'k.id = l.id_kk')
					->join('tweb_penduduk p', 'p.id = k.nik_kepala')
					->where("DATE_FORMAT(l.tgl_peristiwa, '%Y-%m') < '{$thn}-{$pad_bln}'");
					break;
		}

		$penduduk_mutasi_sql = $this->db->get_compiled_select();

		// Mutasi plus
		$penduduk_awal_bulan_plus_sql = $penduduk_mutasi_sql;
		$this->db->select('*')->from('('.$penduduk_awal_bulan_plus_sql.') as p');
		$this->rincian_dasar($tipe);
		switch(true)
		{
			case in_array($tipe, $penduduk):
				$this->db->where('kode_peristiwa in (1,5)');
				break;
			case in_array($tipe, $keluarga):
				$this->db->where('id_peristiwa in (1)');
				break;
		}
	 	$penduduk_awal_bulan_plus_sql = $this->db->get_compiled_select();

	 	// Mutasi minus
	 	$penduduk_awal_bulan_minus_sql = $penduduk_mutasi_sql;
		$this->db->select('*')->from('('.$penduduk_awal_bulan_minus_sql.') as m');
		$this->rincian_dasar($tipe);
		switch(true)
		{
			case in_array($tipe, $penduduk):
				$this->db->where('kode_peristiwa in (2, 3, 4)');
				break;
			case in_array($tipe, $keluarga):
				$this->db->where('id_peristiwa in (2, 3, 4)');
				break;
		}
	 	$penduduk_awal_bulan_minus_sql = $this->db->get_compiled_select();
	 	$this->db->select('*')
 			 ->from('('.$penduduk_awal_bulan_minus_sql.') as minus')
 			 ->where('minus.id = plus.id');
		$penduduk_awal_bulan_minus_sql = $this->db->get_compiled_select();

	 	$this->db->select('*')
 			 ->from('('.$penduduk_awal_bulan_plus_sql.') as plus')
 			 ->where('NOT EXISTS ('.$penduduk_awal_bulan_minus_sql.')');

		$penduduk_mutasi = $this->db->get()->result_array();

	 	return $penduduk_mutasi;
	}

	private function rincian_dasar($tipe)
	{
	 	switch ($tipe)
	 	{
	 		case 'wni_l': $this->db->where('sex = 1 AND warganegara_id <> 2'); break;
	 		case 'wni_p': $this->db->where('sex = 2 AND warganegara_id <> 2'); break;
	 		case 'wna_l': $this->db->where('sex = 1 AND warganegara_id = 2'); break;
	 		case 'wna_p': $this->db->where('sex = 2 AND warganegara_id = 2'); break;
	 		case 'jml': break;
	 		case 'jml_l': $this->db->where('sex = 1'); break;
	 		case 'jml_p': $this->db->where('sex = 2'); break;
	 		case 'kk': break;
	 		case 'kk_l': $this->db->where("sex = 1"); break;
	 		case 'kk_p': $this->db->where("sex = 2"); break;
	 	}
	}

	private function rincian_akhir($tipe)
	{
		$penduduk = ['wni_l', 'wni_p', 'wna_l', 'wna_p', 'jml', 'jml_l', 'jml_p'];
		$keluarga = ['kk', 'kk_l', 'kk_p'];
		$bln = $this->session->bulanku;
		$thn = $this->session->tahunku;
		$pad_bln = str_pad($bln, 2, '0', STR_PAD_LEFT); // Untuk membandingkan dengan tgl mysql

		switch (true)
		{
			case (in_array($tipe, $penduduk)):
				// Perubahan penduduk sebelum bulan laporan
				$this->db
					->select('p.*, l.kode_peristiwa')
					->from('log_penduduk l')
					->join('tweb_penduduk p', 'l.id_pend = p.id')
					->where("DATE_FORMAT(l.tgl_lapor, '%Y-%m') <= '{$thn}-{$pad_bln}'");
				break;
			case (in_array($tipe, $keluarga)):
				// Perubahan penduduk sebelum bulan laporan
				$this->db
					->select('p.*, l.id_peristiwa')
					->from('log_keluarga l')
					->join('tweb_keluarga k', 'k.id = l.id_kk')
					->join('tweb_penduduk p', 'p.id = k.nik_kepala')
					->where("DATE_FORMAT(l.tgl_peristiwa, '%Y-%m') <= '{$thn}-{$pad_bln}'");
					break;
		}

		$penduduk_mutasi_sql = $this->db->get_compiled_select();

		// Mutasi plus
		$this->db->select('*')->from('('.$penduduk_mutasi_sql.') as p');
		$this->rincian_dasar($tipe);
		switch(true)
		{
			case in_array($tipe, $penduduk):
				$this->db->where('kode_peristiwa in (1,5)');
				break;
			case in_array($tipe, $keluarga):
				$this->db->where('id_peristiwa in (1)');
				break;
		}
	 	$mutasi_plus = $this->db->get_compiled_select();

	 	// Mutasi minus
		$this->db->select('*')->from('('.$penduduk_mutasi_sql.') as m');
		$this->rincian_dasar($tipe);
		switch(true)
		{
			case in_array($tipe, $penduduk):
				$this->db->where('kode_peristiwa in (2, 3, 4)');
				break;
			case in_array($tipe, $keluarga):
				$this->db->where('id_peristiwa in (2, 3, 4)');
				break;
		}
	 	$mutasi_minus = $this->db->get_compiled_select();
	 	$this->db->select('*')
 			 ->from('('.$mutasi_minus.') as minus')
 			 ->where('minus.id = plus.id');
		$mutasi_minus = $this->db->get_compiled_select();

	 	$this->db->select('*')
 			 ->from('('.$mutasi_plus.') as plus')
 			 ->where('NOT EXISTS ('.$mutasi_minus.')');

		$penduduk_mutasi = $this->db->get()->result_array();
	 	return $penduduk_mutasi;
	}

	// Panggil setelah menghitung penduduk awal dan semua mutasi
	function penduduk_akhir($rincian = NULL, $tipe = NULL)
	{
		// Jika rincian dan tipe di definisikan, maka akan masuk kedetil laporan
		if ($rincian && $tipe)
		{
			return $this->rincian_akhir($tipe);
		}

		$data = [];
		$kategori = ['WNI_L', 'WNI_P', 'WNA_L', 'WNA_P', 'KK', 'KK_L', 'KK_P'];
		foreach ($kategori as $k)
		{
			$data[$k] = $this->awal[$k] + $this->lahir[$k] + $this->datang[$k] - $this->mati[$k] - $this->pindah[$k] - $this->hilang[$k];
		}
		$data['tahun'] = $thn;
		$data['bulan'] = $bln;

		return $data;
	}

	// Perubahan penduduk pada bulan laporan
	private function mutasi_pada_bln_thn($kode_peristiwa)
	{
		$bln = $this->session->bulanku;
		$thn = $this->session->tahunku;

		$this->db
			->select('p.*, l.ref_pindah, l.kode_peristiwa, lk.id_kk as lk_id_kk')
			->from('log_penduduk l')
			->join('tweb_penduduk p', 'l.id_pend = p.id')
			->join('log_keluarga lk', 'lk.id_kk = p.id_kk', 'left')
			->where('year(l.tgl_lapor)', $thn)
			->where('month(l.tgl_lapor)', $bln)
			->where('l.kode_peristiwa', $kode_peristiwa);

		return $this->db->get_compiled_select();
	}

	/* 	Untuk statistik perkembangan keluarga
			id_peristiwa:
				 1 - keluarga baru
				 2 - kepala keluarga status dasar 'mati'
				 3 - kepala keluarga status dasar 'pindah'
				 4 - kepala keluarga status dasar 'hilang'
				 6 - kepala keluarga status dasar 'pergi' (seharusnya tidak ada)
				 11- kepala keluarga status dasar 'tidak valid' (seharusnya tidak ada)
				 12- anggota keluarga keluar atau pecah dari keluarga
				 13 - keluarga dihapus
				 14 - kepala keluarga status dasar kembali 'hidup' (salah mengisi di log_penduduk)
	*/

	// Perubahan keluarga pada bulan laporan
	private function mutasi_keluarga_bln_thn($kode_peristiwa)
	{
		$keluarga = ['kk', 'kk_l', 'kk_p'];
		$bln = $this->session->bulanku;
		$thn = $this->session->tahunku;

		$id_peristiwa = $kode_peristiwa;

		$this->db
			->select('p.*, l.id_peristiwa')
			->from('log_keluarga l')
			->join('tweb_keluarga k', 'k.id = l.id_kk')
			->join('tweb_penduduk p', 'p.id = k.nik_kepala')
			->join('log_penduduk lp', 'lp.id = l.id_log_penduduk', 'left')
			->group_start()
				->where("lp.tgl_lapor is not null and year(lp.tgl_lapor) = {$thn}")
				->or_where("lp.tgl_lapor is null and year(l.tgl_peristiwa) = {$thn}")
			->group_end()
			->group_start()
				->where("lp.tgl_lapor is not null and month(lp.tgl_lapor) = {$bln}")
				->or_where("lp.tgl_lapor is null and month(l.tgl_peristiwa) = {$bln}")
			->group_end()
			->where('l.id_peristiwa', $id_peristiwa);

		return $this->db->get_compiled_select();
	}

	private function rincian_peristiwa($peristiwa, $tipe)
	{
		$penduduk = ['wni_l', 'wni_p', 'wna_l', 'wna_p', 'jml', 'jml_l', 'jml_p'];
		$keluarga = ['kk', 'kk_l', 'kk_p'];

		if (in_array($tipe, $penduduk))
		{
			$mutasi_pada_bln_thn = $this->mutasi_pada_bln_thn($peristiwa);
			$data = $this->db
				->select('*')
				->from('('.$mutasi_pada_bln_thn.') as m');
			switch ($tipe)
			{
				case 'wni_l': $this->db->where('sex = 1 AND warganegara_id <> 2'); break;
				case 'wni_p': $this->db->where('sex = 2 AND warganegara_id <> 2'); break;
				case 'wna_l': $this->db->where('sex = 1 AND warganegara_id = 2'); break;
				case 'wna_p': $this->db->where('sex = 2 AND warganegara_id = 2'); break;
				case 'jml': break;
				case 'jml_l': $this->db->where('sex = 1'); break;
				case 'jml_p': $this->db->where('sex = 2'); break;
			}
		}
		elseif (in_array($tipe, $keluarga))
		{
			$mutasi_keluarga_bln_thn = $this->mutasi_keluarga_bln_thn($peristiwa);
			$data = $this->db
				->select('*')
				->from('('.$mutasi_keluarga_bln_thn.') as m');
			switch ($tipe)
			{
				case 'kk': break;
				case 'kk_l': $this->db->where('sex = 1'); break;
				case 'kk_p': $this->db->where('sex = 2'); break;
			}
		}

		$data = $this->db->get()->result_array();

		return $data;
	}

	private function mutasi_peristiwa($peristiwa, $rincian = NULL, $tipe = NULL)
	{
		// Jika rincian dan tipe di definisikan, maka akan masuk kedetil laporan
		if ($rincian && $tipe)
		{
			return $this->rincian_peristiwa($peristiwa, $tipe);
		}

		// Mutasi penduduk
		$mutasi_pada_bln_thn = $this->mutasi_pada_bln_thn($peristiwa);
		$data = $this->db
			->select('sum(case when sex = 1 and warganegara_id <> 2 then 1 else 0 end) AS WNI_L')
			->select('sum(case when sex = 2 and warganegara_id <> 2 then 1 else 0 end) AS WNI_P')
			->select('sum(case when sex = 1 and warganegara_id = 2 then 1 else 0 end) AS WNA_L')
			->select('sum(case when sex = 2 and warganegara_id = 2 then 1 else 0 end) AS WNA_P')
			->from('('.$mutasi_pada_bln_thn.') as m')
			->get()
			->row_array();

		// Mutasi keluarga
		$mutasi_keluarga_bln_thn = $this->mutasi_keluarga_bln_thn($peristiwa);
		$kel = $this->db
			->select('sum(case when kk_level = 1 then 1 else 0 end) AS KK')
			->select('sum(case when kk_level = 1 and sex = 1 then 1 else 0 end) AS KK_L')
			->select('sum(case when kk_level = 1 and sex = 2 then 1 else 0 end) AS KK_P')
			->from('('.$mutasi_keluarga_bln_thn.') as m')
			->get()
			->row_array();

		$data = array_merge($data, $kel);
		return $data;
	}

	public function kelahiran($rincian = NULL, $tipe = NULL)
	{
		$this->lahir = $this->mutasi_peristiwa(1, $rincian, $tipe);
		return $this->lahir;
	}

	public function kematian($rincian = NULL, $tipe = NULL)
	{
		$this->mati = $this->mutasi_peristiwa(2, $rincian, $tipe);
		return $this->mati;
	}

	public function pindah($rincian = NULL, $tipe = NULL)
	{
		$this->pindah = $this->mutasi_peristiwa(3, $rincian, $tipe);
		return $this->pindah;
	}

	public function rincian_pindah()
	{
		$mutasi_pada_bln_thn = $this->mutasi_pada_bln_thn(3);

		$data = $this->db
			->select('sum(case when sex = 1 and ref_pindah = 1 then 1 else 0 end) AS DESA_L')
			->select('sum(case when sex = 2 and ref_pindah = 1 then 1 else 0 end) AS DESA_P')
			->select('sum(case when sex = 1 and ref_pindah = 1 and kk_level = 1 then 1 else 0 end) AS DESA_KK_L')
			->select('sum(case when sex = 2 and ref_pindah = 1 and kk_level = 1 then 1 else 0 end) AS DESA_KK_P')

			->select('sum(case when sex = 1 and ref_pindah = 2 then 1 else 0 end) AS KEC_L')
			->select('sum(case when sex = 2 and ref_pindah = 2 then 1 else 0 end) AS KEC_P')
			->select('sum(case when sex = 1 and ref_pindah = 2 and kk_level = 1 then 1 else 0 end) AS KEC_KK_L')
			->select('sum(case when sex = 2 and ref_pindah = 2 and kk_level = 1 then 1 else 0 end) AS KEC_KK_P')

			->select('sum(case when sex = 1 and ref_pindah = 3 then 1 else 0 end) AS KAB_L')
			->select('sum(case when sex = 2 and ref_pindah = 3 then 1 else 0 end) AS KAB_P')
			->select('sum(case when sex = 1 and ref_pindah = 3 and kk_level = 1 then 1 else 0 end) AS KAB_KK_L')
			->select('sum(case when sex = 2 and ref_pindah = 3 and kk_level = 1 then 1 else 0 end) AS KAB_KK_P')

			->select('sum(case when sex = 1 and ref_pindah = 4 then 1 else 0 end) AS PROV_L')
			->select('sum(case when sex = 2 and ref_pindah = 4 then 1 else 0 end) AS PROV_P')
			->select('sum(case when sex = 1 and ref_pindah = 4 and kk_level = 1 then 1 else 0 end) AS PROV_KK_L')
			->select('sum(case when sex = 2 and ref_pindah = 4 and kk_level = 1 then 1 else 0 end) AS PROV_KK_P')

			->from('('.$mutasi_pada_bln_thn.') as m')
			->get()
			->row_array();

		$data['TOTAL_L'] = $data['DESA_L'] + $data['KEC_L'] + $data['KAB_L'] + $data['PROV_L'];
		$data['TOTAL_P'] = $data['DESA_P'] + $data['KEC_P'] + $data['KAB_P'] + $data['PROV_P'];
		$data['TOTAL_KK_L'] = $data['DESA_KK_L'] + $data['KEC_KK_L'] + $data['KAB_KK_L'] + $data['PROV_KK_L'];
		$data['TOTAL_KK_P'] = $data['DESA_KK_P'] + $data['KEC_KK_P'] + $data['KAB_KK_P'] + $data['PROV_KK_P'];
		return $data;
	}

	public function pendatang($rincian = NULL, $tipe = NULL)
	{
		$this->datang = $this->mutasi_peristiwa(5, $rincian, $tipe);
		return $this->datang;
	}

	public function hilang($rincian = NULL, $tipe = NULL)
	{
		$this->hilang = $this->mutasi_peristiwa(4, $rincian, $tipe);
		return $this->hilang;
	}

	public function rekapitulasi_list($offset = 0, $limit = 0)
	{
		//List Data
		$this->rekapitulasi_data();

		//Paging SQL
		if ($limit > 0 ) $this->db->limit($limit, $offset);

		$data = $this->db->get()->result_array();

		//Set Penduduk Akhir
		foreach ($data as $key => $value)
		{
			$data[$key]['WNI_L_AKHIR'] = $value['WNI_L_AWAL'] + $value['WNI_L_TAMBAH_LAHIR'] + $value['WNI_L_TAMBAH_MASUK'] - $value['WNI_L_KURANG_MATI'] - $value['WNI_L_KURANG_KELUAR'];
			$data[$key]['WNI_P_AKHIR'] = $value['WNI_P_AWAL'] + $value['WNI_P_TAMBAH_LAHIR'] + $value['WNI_P_TAMBAH_MASUK'] - $value['WNI_P_KURANG_MATI'] - $value['WNI_P_KURANG_KELUAR'];
			$data[$key]['WNA_L_AKHIR'] = $value['WNA_L_AWAL'] + $value['WNA_L_TAMBAH_LAHIR'] + $value['WNA_L_TAMBAH_MASUK'] - $value['WNA_L_KURANG_MATI'] - $value['WNA_L_KURANG_KELUAR'];
			$data[$key]['WNA_P_AKHIR'] = $value['WNA_P_AWAL'] + $value['WNA_P_TAMBAH_LAHIR'] + $value['WNA_P_TAMBAH_MASUK'] - $value['WNA_P_KURANG_MATI'] - $value['WNA_P_KURANG_KELUAR'];
			$data[$key]['KK_AKHIR_JML'] = $value['KK_JLH'] + $value['KK_MASUK_JLH'];
			$data[$key]['KK_AKHIR_ANG_KEL'] = $value['KK_ANG_KEL'] + $value['KK_MASUK_ANG_KEL'];
		}

		return $data;
	}

	public function rekapitulasi_data()
	{
		$bln = $this->session->filter_bulan;
		$thn = $this->session->filter_tahun;
		$pad_bln = str_pad($bln, 2, '0', STR_PAD_LEFT); // Untuk membandingkan dengan tgl mysql
		$data = $this->db
			->select('a.dusun as DUSUN')
			// Penduduk Awal Bulan
			->select("(sum(case when p.sex = 1 and p.warganegara_id <> 2 and l.kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when p.sex = 1 and p.warganegara_id <> 2 and l.kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS WNI_L_AWAL")
			->select("(sum(case when p.sex = 2 and p.warganegara_id <> 2 and l.kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when p.sex = 2 and p.warganegara_id <> 2 and l.kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS WNI_P_AWAL")
			->select("(sum(case when p.sex = 1 and p.warganegara_id = 2 and l.kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when p.sex = 1 and p.warganegara_id = 2 and l.kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS WNA_L_AWAL")
			->select("(sum(case when p.sex = 2 and p.warganegara_id = 2 and l.kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when p.sex = 2 and p.warganegara_id = 2 and l.kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS WNA_P_AWAL")
			// Tambahan Lahir
			->select("sum(case when p.sex = 1 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 1 then 1 else 0 end) AS WNI_L_TAMBAH_LAHIR")
			->select("sum(case when p.sex = 2 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 1 then 1 else 0 end) AS WNI_P_TAMBAH_LAHIR")
			->select("sum(case when p.sex = 1 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 1 then 1 else 0 end) AS WNA_L_TAMBAH_LAHIR")
			->select("sum(case when p.sex = 2 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 1 then 1 else 0 end) AS WNA_P_TAMBAH_LAHIR")
			// Tambahan Pendatang
			->select("sum(case when p.sex = 1 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 5 then 1 else 0 end) AS WNI_L_TAMBAH_MASUK")
			->select("sum(case when p.sex = 2 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 5 then 1 else 0 end) AS WNI_P_TAMBAH_MASUK")
			->select("sum(case when p.sex = 1 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 5 then 1 else 0 end) AS WNA_L_TAMBAH_MASUK")
			->select("sum(case when p.sex = 2 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 5 then 1 else 0 end) AS WNA_P_TAMBAH_MASUK")
			// Keluar Mati
			->select("sum(case when p.sex = 1 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 2 then 1 else 0 end) AS WNI_L_KURANG_MATI")
			->select("sum(case when p.sex = 2 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 2 then 1 else 0 end) AS WNI_P_KURANG_MATI")
			->select("sum(case when p.sex = 1 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 2 then 1 else 0 end) AS WNA_L_KURANG_MATI")
			->select("sum(case when p.sex = 2 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 2 then 1 else 0 end) AS WNA_P_KURANG_MATI")
			// Keluar Pindah
			->select("sum(case when p.sex = 1 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 3 then 1 else 0 end) AS WNI_L_KURANG_KELUAR")
			->select("sum(case when p.sex = 2 and p.warganegara_id <> 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 3 then 1 else 0 end) AS WNI_P_KURANG_KELUAR")
			->select("sum(case when p.sex = 1 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 3 then 1 else 0 end) AS WNA_L_KURANG_KELUAR")
			->select("sum(case when p.sex = 2 and p.warganegara_id = 2 and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn and l.kode_peristiwa = 3 then 1 else 0 end) AS WNA_P_KURANG_KELUAR")
			// KK
			->select("(sum(case when p.kk_level = 1 and kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when kk_level = 1 and kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS KK_JLH")
			->select("(sum(case when p.kk_level != 1 and kode_peristiwa in (1,5) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end) - sum(case when p.kk_level != 1 and kode_peristiwa in (2,3,4) and DATE_FORMAT(l.tgl_lapor, '%Y-%m') < '{$thn}-{$pad_bln}' then 1 else 0 end)) AS KK_ANG_KEL")
			->select("(sum(case when p.kk_level = 1 and kode_peristiwa in (1,5) and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn then 1 else 0 end) - sum(case when p.kk_level = 1 and kode_peristiwa in (2,3,4) and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn then 1 else 0 end)) AS KK_MASUK_JLH")
			->select("(sum(case when p.kk_level != 1 and kode_peristiwa in (1,5) and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn then 1 else 0 end) - sum(case when p.kk_level != 1 and kode_peristiwa in (2,3,4) and month(l.tgl_lapor) = $bln and year(l.tgl_lapor) = $thn then 1 else 0 end)) AS KK_MASUK_ANG_KEL");

		$this->rekapitulasi_query_dasar();
	}

	private function rekapitulasi_query_dasar()
	{
		$this->db
			->from('log_penduduk l')
			->join('tweb_penduduk p', 'l.id_pend = p.id')
			->join('tweb_keluarga d', 'p.id_kk = d.id')
			->join('tweb_wil_clusterdesa a', 'd.id_cluster = a.id', 'left')
			->where('p.status', 1)
			->group_by('a.dusun');
	}

	public function rekapitulasi_paging($p=1)
	{
		$this->db->select('COUNT(a.dusun) as jml');
		$this->rekapitulasi_query_dasar();

		$jml = $this->db->get()->row()->jml;

		$this->load->library('paging');
		$cfg['page'] = $p;
		$cfg['per_page'] = $this->session->per_page;
		$cfg['num_rows'] = $jml;
		$this->paging->init($cfg);

		return $this->paging;
	}

}

?>
