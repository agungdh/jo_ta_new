<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

use application\eloquents\Berita as Berita_model;

class Berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a', 'p']);
	}

	public function index()
	{
		$beritas = Berita_model::orderBy('tanggal', 'DESC')->get();

		return blade('berita.index', compact(['beritas']));
	}
}