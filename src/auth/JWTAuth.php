<?php
namespace src\auth;

use Slight\http\HttpAuth;
use Slight\router\Route;
use Firebase\JWT\JWT;
use Slight\Config;

class JWTAuth implements HttpAuth {

	public static function onAuthentication(Route $router): bool {
		$headers = apache_request_headers();
		if (! isset($headers['Authorization'])) {
			return false;
		}
		
		list ($token) = sscanf($headers['Authorization'], 'Bearer %s');
		
		try {
			$_REQUEST['user'] = (array) JWT::decode($token, Config::getAttribute('JWT_SECRET_KEY'), [
				'HS256'
			]);
		} catch (\Exception $e) {
			return false;
		}
		
		return true;
	}
}