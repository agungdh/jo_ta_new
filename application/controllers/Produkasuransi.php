<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Produk as Produk_model;

class Produkasuransi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a', 'p']);
	}

	public function index()
	{
		$produkIndividual = Produk_model::where('jenis', 'i')->get();
		$produkKelompok = Produk_model::where('jenis', 'k')->get();

		return blade('produkasuransi.index', compact(['produkIndividual', 'produkKelompok']));
	}
}