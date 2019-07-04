<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Produk as Produk_model;

class Produkasuransiadmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a']);
	}

	public function index()
	{
		$produkAsuransis = Produk_model::all();
		
		return blade('produkasuransiadmin.index', compact(['produkAsuransis']));
	}

	public function tambah()
	{
		return blade('produkasuransiadmin.tambah');
	}

	public function aksitambah()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'produk' => 'required',
			'jenis' => 'required',
			'deskripsi' => 'required',
		]);

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('produkasuransiadmin/tambah'));
		}

		$requestData['id_user'] = $this->session->userID;

		Produk_model::insert($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Tambah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('produkasuransiadmin'));
	}

	public function ubah($id)
	{
		$produkAsuransi = Produk_model::find($id);

		return blade('produkasuransiadmin.ubah', compact(['produkAsuransi']));
	}

	public function aksiubah($id)
	{
		$produkAsuransi = Produk_model::find($id);

		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'produk' => 'required',
			'jenis' => 'required',
			'deskripsi' => 'required',
		]);

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('produkasuransiadmin/ubah/' . $id));
		}
		
		$requestData['id_user'] = $this->session->userID;
		Produk_model::where('id', $id)->update($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Ubah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('produkasuransiadmin'));
	}

	public function aksihapus($id)
	{
		try {
			Produk_model::where('id', $id)->delete();
		} catch (QueryException $exception) {
            $this->session->set_flashdata(
			'alert',
			[
				'title' => 'ERROR !!!',
                'message' => ENVIRONMENT == 'development' ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
			]);

			redirect(base_url('produkasuransiadmin'));
        }

		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Hapus Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('produkasuransiadmin'));
	}
}
