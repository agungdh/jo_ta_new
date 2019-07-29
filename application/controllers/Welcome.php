<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

use application\eloquents\Usulan as Usulan_model;
use application\eloquents\Kecamatan as Kecamatan_model;
use application\eloquents\Opd as Opd_model;

class Welcome extends CI_Controller {
	public function index()
	{
		$opds = Opd_model::all();
		$kecamatans = Kecamatan_model::where('kabupaten_id', 1810)->get();
		$usulan = $this->input->post();

		$usulans = Usulan_model::with('opd', 'userOpd', 'userKecamatan', 'userKabupaten');

		if (!isset($usulan['id_opd'])) {
			$usulan['id_opd'] = '';
		}
		if (!isset($usulan['id_kecamatan'])) {
			$usulan['id_kecamatan'] = '';
		}
		if (!isset($usulan['tahun'])) {
			$usulan['tahun'] = '';
		}

		if ($usulan['id_opd']) {
			$usulans->where('id_opd', $usulan['id_opd']);
		}
		if ($usulan['id_kecamatan']) {
			$usulans->where('id_kecamatan', $usulan['id_kecamatan']);
		}
		if ($usulan['tahun']) {
			$usulans->where('tahun', $usulan['tahun']);
		}

		$usulans = $usulans->get();

		return blade('public.index', compact(['usulans', 'opds', 'kecamatans', 'usulan']));
	}

	public function trace($id)
	{
		$usulan = Usulan_model::find($id);
		$trackings = $usulan->trackings;
		
		return blade('usulan.ajaxtracking', compact(['usulan', 'trackings']));
	}
}
