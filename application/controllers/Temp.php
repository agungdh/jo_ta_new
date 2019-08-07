<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

class Temp extends CI_Controller {
	public function index()
	{
		$datas = DB::select("SELECT p.id provinsi, ka.id kabupaten, ke.id kecamatan
						FROM provinsi p, kabupaten ka, kecamatan ke
						WHERE ke.kabupaten_id = ka.id
						AND ka.provinsi_id = p.id
						AND ka.id = 1810
						");

		$deleteID = [];
		foreach ($datas as $data) {
			$deleteID[] = $data->kecamatan;
		}

		DB::table('kecamatan')->whereNotIn('id', $deleteID)->delete();
	}
}
