<?php
session_start();

include "classes/DatabaseClass.php";
include "classes/AuthClass.php";
include "classes/UrlClass.php";

if (isset($_SERVER['PATH_INFO']))
{
	echo $_SERVER['PATH_INFO'];
	$shortCode = ltrim($_SERVER['PATH_INFO'], '/');
	if (!empty($shortCode)) {
		$db = new DatabaseClass();
		$url_control = new UrlClass($db);
		$full_url = $url_control->getFullUrl($shortCode);

		header('Location: ' . $full_url);
	}
}

if (isset($_POST['register']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$db = new DatabaseClass();
	$register = new AuthClass($db);
	$user = $register->register($name, $email, $password);
	if ($user)
	{

		ini_set('session.cookie_httponly', 1);
		ini_set('session.use_only_cookies', 1);
		ini_set('session.cookie_secure', 1);
		session_regenerate_id();

		$_SESSION['msg'] = $name.'  '.$email.'  '.$password;
		header('Location: ..\index.php');
	} else
	{
		$_SESSION['msg'] = "Эта почта уже зарегистрирована";
		header('Location: ..\register.php');
	}
}

if (isset($_POST['login']))
{
	$db = new DatabaseClass();
	$register = new AuthClass($db);
	$user = $register->login($_POST['email'],$_POST['password']);
	if ($user)
	{

		ini_set('session.cookie_httponly', 1);
		ini_set('session.use_only_cookies', 1);
		ini_set('session.cookie_secure', 1);
		session_regenerate_id();

		$_SESSION['msg'] = $_POST['email']."   ".$_POST['password'];
		header('Location: ..\index.php');
	} else
	{
		$_SESSION['msg'] = "Email или пароль указан неверно. Проверьте или зарегистрируйтесь";
		header('Location: ..\login.php');
	}
}


if (!isset($_SESSION['user_id'])) {
	header('Location: ../login.php');
	exit;
}


if (isset($_POST['create_url']))
{
	$db = new DatabaseClass();
	$url_control = new UrlClass($db);
	$short_url = $url_control->createShortUrl($_POST['create_url'], $_SESSION['user_id'], $_POST['url_name']);
	echo json_encode($short_url, JSON_UNESCAPED_UNICODE);
}

if (isset($_GET['get_all_urls'])){
	$db = new DatabaseClass();
	$url_control = new UrlClass($db);
	$result = $url_control->get_all_urls($_SESSION['user_id']);
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['get_click_times']))
{
	$db = new DatabaseClass();
	$url_control = new UrlClass($db);
	$result = $url_control->get_click_times($_POST['get_click_times']);
	$dataArray = array();
	foreach ($result as $row) {
		$dataArray[] = $row['click_data'];
	}
	echo json_encode($dataArray, JSON_UNESCAPED_UNICODE); }

if (isset($_POST['delete_url']))
{
	$db = new DatabaseClass();
	$url_control = new UrlClass($db);
	$delete = $url_control->delete_url($_POST['delete_url']);
	echo json_encode($delete, JSON_UNESCAPED_UNICODE);
}

if (isset($_GET['logout'])){
	session_destroy();
	header('Location: ../login.php');
}