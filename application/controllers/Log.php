<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as DB;

use application\eloquents\User as User_model;

class Log extends CI_Controller {

	public function in()
	{
		$requestData = $this->input->post();
		
		$validator = validator()->make($requestData, [
			'username' => 'required',
			'password' => 'required',
		]);

		if ($validator->passes()) {
			$user = User_model::where('username', $requestData['username'])->first();
			if (!($user && password_verify($requestData['password'], $user->password))) {
				$validator->errors()->add('username', 'Username / Password Salah !!!');
				$validator->errors()->add('password', 'Username / Password Salah !!!');
			}
		}

		if (count($validator->errors()) > 0) {
			$this->session->set_flashdata('loginErrors', $validator->errors());
			$this->session->set_flashdata('loginOld', $requestData);
			$this->session->set_flashdata('loginError', true);
		} else {
			$this->session->set_userdata([
				'userID' => $user->id,
				'login' => true,
			]);
		}

		redirect(base_url());
	}

	public function out() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
