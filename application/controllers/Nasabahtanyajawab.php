<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\QueryException;

class Nasabahtanyajawab extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// helper()->auth(['a', 'p']);
	}

	public function index()
	{
		return blade('nasabahtanyajawab.index');
	}
}