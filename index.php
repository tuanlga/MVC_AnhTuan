<?php 
require_once 'app/controllers/PostController.php';

$url = isset($_GET['url']) ? $_GET['url'] : '/';

// var_dump($url);

switch ($url) {
	case "/":
		echo 'Trang chu';
		break;
	case "posts":
		$ctl = new PostController();
		$ctl->index();
		break;
	case "posts/create":
		$ctl = new PostController();
		$ctl->create();
		break;

	case "posts/store":
		$ctl = new PostController();
		$ctl->store();
		break;

	case "posts/":
		$ctl = new PostController();
		$ctl->index();
		break;

	default:
		include_once 'app/views/layouts/notfound.php';
		break;
}