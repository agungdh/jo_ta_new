<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Usulan as Usulan_model;
use application\eloquents\Kecamatan as Kecamatan_model;
use application\eloquents\Opd as Opd_model;

class Usulan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a']);
	}

	public function index()
	{
		$usulans = Usulan_model::with('opd', 'userOpd', 'userKecamatan', 'userKabupaten')->where('id_kecamatan', getUserData()->id_kecamatan)->get();
		
		return blade('usulan.index', compact(['usulans']));
	}

	public function tambah()
	{
		$opds = Opd_model::all();
		$kecamatans = Kecamatan_model::where('kabupaten_id', 1810)->get();
		
		return blade('usulan.tambah', compact(['opds', 'kecamatans']));
	}

	public function aksitambah()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'tanggal' => 'required',
			'tahun' => 'required|numeric',
			'id_opd' => 'required',
			'kegiatan' => 'required',
			'satuan' => 'required',
			'harga_satuan' => 'required',
			'jumlah' => 'required',
			'lokasi' => 'required',
		]);

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('usulan/tambah'));
		}

		$requestData['id_user_kecamatan'] = $this->session->userID;
		$requestData['tanggal'] = helper()->parseTanggalIndo($requestData['tanggal']);
		unset($requestData['total_biaya']);
		$requestData['harga_satuan'] = str_replace('.', '', $requestData['harga_satuan']);
		$requestData['jumlah'] = str_replace('.', '', $requestData['jumlah']);
		$requestData['id_kecamatan'] = getUserData()->id_kecamatan;

		Usulan_model::insert($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Tambah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('usulan'));
	}

	public function ubah($id)
	{
		$opds = Opd_model::all();
		$kecamatans = Kecamatan_model::where('kabupaten_id', 1810)->get();
		$usulan = Usulan_model::find($id);
		$usulan['tanggal'] = helper()->tanggalIndo($usulan['tanggal']);

		return blade('usulan.ubah', compact(['usulan', 'opds', 'kecamatans']));
	}

	public function aksiubah($id)
	{
		$usulan = Usulan_model::find($id);

		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'tanggal' => 'required',
			'tahun' => 'required|numeric',
			'id_opd' => 'required',
			'kegiatan' => 'required',
			'satuan' => 'required',
			'harga_satuan' => 'required',
			'jumlah' => 'required',
			'lokasi' => 'required',
		]);

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('usulan/ubah/' . $id));
		}

		$requestData['id_user_kecamatan'] = $this->session->userID;
		$requestData['tanggal'] = helper()->parseTanggalIndo($requestData['tanggal']);
		unset($requestData['total_biaya']);
		$requestData['harga_satuan'] = str_replace('.', '', $requestData['harga_satuan']);
		$requestData['jumlah'] = str_replace('.', '', $requestData['jumlah']);
		$requestData['id_kecamatan'] = getUserData()->id_kecamatan;
		
		Usulan_model::where('id', $id)->update($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Ubah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('usulan'));
	}

	public function aksihapus($id)
	{
		try {
			Usulan_model::where('id', $id)->delete();
		} catch (QueryException $exception) {
            $this->session->set_flashdata(
			'alert',
			[
				'title' => 'ERROR !!!',
                'message' => ENVIRONMENT == 'development' ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
			]);

			redirect(base_url('usulan'));
        }

		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Hapus Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('usulan'));
	}
}
