<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

use application\eloquents\Usulan as Usulan_model;
use application\eloquents\Kecamatan as Kecamatan_model;
use application\eloquents\Opd as Opd_model;

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		helper()->auth(['a']);
	}
	
	public function index()
	{
		return blade('laporan.index');
	}

	public function pdf()
	{
		$requestData = $this->input->post();

		$validator = validator()->make($requestData, [
			'tahun' => 'required|numeric|min:1900|max:2900',
		]);

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('laporan'));
		}

		$usulans = Usulan_model::where(['tahun' => $requestData['tahun']])->get();
		
		$dompdf = new Dompdf\Dompdf();
		$dompdf->set_option('defaultFont', 'Courier');
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->loadHtml(bladeHtml('laporan.pdf', compact(['usulans', 'requestData'])));
		$dompdf->render();
		$dompdf->stream('Laporan Musrenbang Pringsewu Tahun ' . $requestData['tahun'] . '.pdf', array("Attachment" => false));
	}
}
