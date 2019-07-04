<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\User as User_model;
use application\eloquents\Opd as Opd_model;
use application\eloquents\Kecamatan as Kecamatan_model;

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a']);
	}

	public function index()
	{
		$users = User_model::with('opd', 'kecamatan')->get();

		return blade('user.index', compact(['users']));
	}

	public function tambah()
	{
		$opds = Opd_model::all();
		$kecamatans = Kecamatan_model::where('kabupaten_id', 1810)->get();
		
		return blade('user.tambah', compact(['opds', 'kecamatans']));
	}

	public function aksitambah()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'nama' => 'required',
			'username' => 'required',
			'level' => 'required',
			'password' => 'required|confirmed',
			'id_opd' => 'required_if:level,opopd',
			'id_kecamatan' => 'required_if:level,opkec',
		]);

		if (User_model::where(['username' => $requestData['username']])->first()) {
			$validator->errors()->add('username', 'Username sudah ada !!!');
		}

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('user/tambah'));
		}

		unset($requestData['password_confirmation']);
		$requestData['password'] = password_hash($requestData['password'], PASSWORD_BCRYPT);
		$requestData['id_opd'] = $requestData['id_opd'] ?: null;
		$requestData['id_kecamatan'] = $requestData['id_kecamatan'] ?: null;

		User_model::insert($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Tambah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('user'));
	}

	public function ubah($id)
	{
		$opds = Opd_model::all();
		$kecamatans = Kecamatan_model::where('kabupaten_id', 1810)->get();

		$user = User_model::find($id);

		return blade('user.ubah', compact(['user', 'opds', 'kecamatans']));
	}

	public function aksiubah($id)
	{
		$user = User_model::find($id);

		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'nama' => 'required',
			'username' => 'required',
			'level' => 'required',
			'password' => 'confirmed',
			'id_opd' => 'required_if:level,opopd',
			'id_kecamatan' => 'required_if:level,opkec',
		]);

		if ($requestData['username'] != $user->username && User_model::where(['username' => $requestData['username']])->first()) {
			$validator->errors()->add('username', 'Username sudah ada !!!');
		}

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('user/ubah/' . $id));
		}

		unset($requestData['password_confirmation']);
		if ($requestData['password']) {
			$requestData['password'] = password_hash($requestData['password'], PASSWORD_BCRYPT);
		} else {
			unset($requestData['password']);
		}

		$requestData['id_opd'] = $requestData['id_opd'] ?: null;
		$requestData['id_kecamatan'] = $requestData['id_kecamatan'] ?: null;

		User_model::where('id', $id)->update($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Ubah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('user'));
	}

	public function aksihapus($id)
	{

		if ($this->session->userID == $id) {
			$this->session->set_flashdata(
				'alert',
				[
					'title' => 'ERROR !!!',
					'message' => 'Tidak Dapat Menghapus User Sendiri !!!',
					'class' => 'error',
				]
			);

			redirect(base_url('user'));
		}

		try {
			User_model::where('id', $id)->delete();
		} catch (QueryException $exception) {
            $this->session->set_flashdata(
			'alert',
			[
				'title' => 'ERROR !!!',
                'message' => ENVIRONMENT == 'development' ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
			]);

			redirect(base_url('user'));
        }

		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Hapus Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('user'));
	}
}
