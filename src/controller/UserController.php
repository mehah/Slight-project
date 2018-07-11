<?php
namespace src\controller;

use Slight\validator\Validator;
use src\model\User;

class UserController {

	public function update($id, $name) {
		return "User id($id) updated to name: $name";
	}

	public function insert(User $user) {
		$msg;
		if (Validator::validate($user)->hasError()) {
			$msg = 'Name is required.';
		} else {
			try {
				$msg = $user->insert() ? 'User inserted.' : 'Error on insert User.';
			} catch (\Exception $e) {
				http_response_code(500);
				$msg = $e->getMessage();
			}
		}
		
		return $msg;
	}
}