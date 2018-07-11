<?php
use Slight\router\Router;
use src\controller\UserController;
use src\controller\SessionController;
use src\controller\JWTController;
use src\auth\JWTAuth;

Router::post('user', UserController::class, 'insert');
Router::put('user/:id/:name', UserController::class, 'update');

Router::post('user/login/session', SessionController::class, 'login');
Router::get('user/check/session', SessionController::class, 'test', [
	'TEST_RULE'
]);

Router::post('user/login/jwt', JWTController::class, 'login');
Router::get('user/check/jwt', JWTController::class, 'test')->setAuthClass(JWTAuth::class);