<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Agen as Agen_model;

class Agenadmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a']);
	}

	public function index()
	{
		$agens = Agen_model::all();
		
		return blade('agenadmin.index', compact(['agens']));
	}

	public function tambah()
	{
		return blade('agenadmin.tambah');
	}

	public function aksitambah()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'nama' => 'required',
			'no_hp' => 'required',
		]);

		if (Agen_model::where(['no_hp' => $requestData['no_hp']])->first()) {
			$validator->errors()->add('no_hp', 'No HP sudah ada !!!');
		}

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('agenadmin/tambah'));
		}

		$requestData['id_user'] = $this->session->userID;
		Agen_model::insert($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Tambah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('agenadmin'));
	}

	public function ubah($id)
	{
		$agen = Agen_model::find($id);

		return blade('agenadmin.ubah', compact(['agen']));
	}

	public function aksiubah($id)
	{
		$agen = Agen_model::find($id);

		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'nama' => 'required',
			'no_hp' => 'required',
		]);

		if ($requestData['no_hp'] != $agen->no_hp && Agen_model::where(['no_hp' => $requestData['no_hp']])->first()) {
			$validator->errors()->add('no_hp', 'No HP sudah ada !!!');
		}

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('agenadmin/ubah/' . $id));
		}

		$requestData['id_user'] = $this->session->userID;
		Agen_model::where('id', $id)->update($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Ubah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('agenadmin'));
	}

	public function aksihapus($id)
	{
		try {
			Agen_model::where('id', $id)->delete();
		} catch (QueryException $exception) {
            $this->session->set_flashdata(
			'alert',
			[
				'title' => 'ERROR !!!',
                'message' => ENVIRONMENT == 'development' ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
			]);

			redirect(base_url('agenadmin'));
        }

		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Hapus Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('agenadmin'));
	}
}
