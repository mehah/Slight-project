<?php
namespace src\controller;

use src\model\User;
use Slight\Config;
use Firebase\JWT\JWT;

class JWTController {

	public function test(User $user) {
		return "User '$user->name' is authenticated.";
	}

	public function login(User $user) {
		return JWT::encode($user, Config::getAttribute('JWT_SECRET_KEY'));
	}
}