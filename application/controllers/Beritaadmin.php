<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Berita as Berita_model;

class Beritaadmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a']);
	}

	public function index()
	{
		$beritas = Berita_model::orderBy('tanggal', 'DESC')->get();
		
		return blade('beritaadmin.index', compact(['beritas']));
	}

	public function tambah()
	{
		return blade('beritaadmin.tambah');
	}

	public function aksitambah()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'tanggal' => 'required',
			'judul' => 'required',
			'berita' => 'required',
		]);

		$requestData['tanggal'] = $requestData['tanggal'] ? helper()->parseTanggalIndo($requestData['tanggal']) : null;

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('beritaadmin/tambah'));
		}
		
		$requestData['id_user'] = $this->session->userID;
		Berita_model::insert($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Tambah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('beritaadmin'));
	}

	public function ubah($id)
	{
		$berita = Berita_model::find($id);
		$berita->tanggal = helper()->tanggalIndo($berita->tanggal);
		
		return blade('beritaadmin.ubah', compact(['berita']));
	}

	public function aksiubah($id)
	{
		$agen = Berita_model::find($id);

		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'tanggal' => 'required',
			'judul' => 'required',
			'berita' => 'required',
		]);

		$requestData['tanggal'] = $requestData['tanggal'] ? helper()->parseTanggalIndo($requestData['tanggal']) : null;

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('errors', $validator->errors());
			$this->session->set_flashdata('old', $requestData);
			
			redirect(base_url('beritaadmin/ubah/' . $id));
		}

		$requestData['id_user'] = $this->session->userID;
		Berita_model::where('id', $id)->update($requestData);
		
		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Ubah Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('beritaadmin'));
	}

	public function aksihapus($id)
	{
		try {
			Berita_model::where('id', $id)->delete();
		} catch (QueryException $exception) {
            $this->session->set_flashdata(
			'alert',
			[
				'title' => 'ERROR !!!',
                'message' => ENVIRONMENT == 'development' ? $exception->getMessage() : 'Something Went Wrong !!!',
                'class' => 'error',
			]);

			redirect(base_url('beritaadmin'));
        }

		$this->session->set_flashdata(
			'alert',
			[
				'title' => 'Sukses',
				'message' => 'Hapus Data Berhasil !!!',
				'class' => 'success',
			]
		);

		redirect(base_url('beritaadmin'));
	}
}
