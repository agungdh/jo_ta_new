<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

class Temp extends CI_Controller {
	public function index()
	{
		$datas = DB::select("SELECT p.id provinsi, ka.id kabupaten, ke.id kecamatan, d.id desa
						FROM provinsi p, kabupaten ka, kecamatan ke, desa d
						WHERE d.kecamatan_id = ke.id
						AND ke.kabupaten_id = ka.id
						AND ka.provinsi_id = p.id
						");

		dd($datas);
	}
}
