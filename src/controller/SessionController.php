<?php
namespace src\controller;

use Slight\http\HttpSession;
use src\model\User;

class SessionController {

	public function test(HttpSession $session) {
		$session->destroy();
		
		return "User Logged!";
	}

	public function login(HttpSession $session, User $user) {
		$session->setUserPrincipal($user);
		
		return "User '$user->name' inserted on session.";
	}
}