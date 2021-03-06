<?php
namespace application\classes;

use Illuminate\Database\Capsule\Manager as DB;
use application\eloquents\HariLibur as HariLibur_model;
use application\eloquents\User as User_model;
use application\eloquents\Kendaraan as Kendaraan_model;
use application\eloquents\Transaksi as Transaksi_model;

class Helper extends \agungdh\Pustaka
{

	public static function auth($level) {
		self::bootEloquent();

		if (!ci()->session->login) {
			redirect(base_url());
		}
	}

	public static function belumBayar($bulan, $tahun)
	{
		$kendaraansID_raw = Kendaraan_model::select('id')->where('mulai_penagihan_bulan', '<=', $bulan)->where('mulai_penagihan_tahun', '<=', $tahun)->get();

		$kendaraansID = [];
		foreach ($kendaraansID_raw as $item) {
			$kendaraansID[] = $item->id;
		}

		$transaksis = Transaksi_model::whereIn('id_kendaraan', $kendaraansID)->where('bulan', $bulan)->where('tahun', $tahun)->count();

		return count($kendaraansID) - $transaksis;
	}

	public static function bulanIndonesia()
	{
		return [
	        '1' => 'Januari',
	        '2' => 'Februari',
	        '3' => 'Maret',
	        '4' => 'April',
	        '5' => 'Mei',
	        '6' => 'Juni',
	        '7' => 'Juli',
	        '8' => 'Agustus',
	        '9' => 'September',
	        '10' => 'Oktober',
	        '11' => 'November',
	        '12' => 'Desember',
		];
	}

	public static function getKonfigurasi()
	{
		$temp = DB::table('konfigurasi')->get();

		$newVar = [];
		foreach ($temp as $item) {
			$newVar[$item->konfigurasi] = $item->value;
		}

		return $newVar;
	}

	public static function cekKuotaSms()
	{
		$config = helper()->getKonfigurasi();

		return json_decode(
			json_encode(
				simplexml_load_string(
					file_get_contents(
						"http://reguler.zenziva.net/apps/smsapibalance.php?userkey="
						. $config['ZENZIVA_API_USER'] 
						. "&passkey=" 
						. $config['ZENZIVA_API_PASS']
					)
				)
			)
		);
	}

	public static function bootEloquent() {
		$db = new DB;

		$db->addConnection([
			"driver"    => "mysql",
			"host" => 'localhost',
			"database" => 'jo_ta_new',
			"username" => 'agungdh',
			"password" => 'agungdh',
		]);

		$db->setAsGlobal();
		$db->bootEloquent();
	}
}