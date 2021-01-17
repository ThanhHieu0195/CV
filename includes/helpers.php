<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require('./vendor/autoload.php');
$language = 'en';
function get_component($name, $data) {
    global $language;
    include 'components/' . $language . '/' . $name . '.php';
}

class MongoClient {
	function __construct() {
		$this->client = new MongoDB\Client(
		    'mongodb://157.230.32.185/db'
		);
		$this->db = $this->client->db;
	}

	function getUser($userId) {
		return $this->db->cv->findOne([
			'user' => $userId
		]);
	}

	function insertUser($userData=[]) {
		return $this->db->cv->insertOne($userData);
	}

	function updateUserData($oId, $userData=[]) {
		return $this->db->cv->updateOne(
			[
				'_id' => new MongoDB\BSON\ObjectId($oId)
			],
			[
				'$set' => [
					'data' => $userData
				]
			]
		);
	}
}

$userId = $_GET['user'];
$client = new MongoClient();
$user = $client->getUser($userId);
$data = (array)($user)->data;
// require('data.php');

if (!empty($_POST['action']) && $user->_id) {
	if ($_POST['action'] == 'postUpdate') {
		$userData = $_POST['postData'];
		if (!empty($userData)) {
			$result = $client->updateUserData($user->_id, $userData);
		}

		echo json_encode($result);
	}
	exit(200);
}

if (!empty($_GET['action']) && $_GET['action'] == 'pdf') {
	require('phppdf.php');
	try
	{
		$path = './tmp/'.$userId.'.pdf';
		$filename = $userId.'.pdf';
		$acc = 'demo';
		$key = 'ce544b6ea52a5621fb9d55f8b542d14d';
		if (!empty($_GET['active']) && $_GET['active']) {
			$acc = 'Mkkarrot';
			$key = '19b34819fcda1395ba7b5aece5b15733';
		}
	    $client = new \Pdfcrowd\HtmlToPdfClient($acc, $key);
	    $client->setPageWidth("20in");
	    $client->setPageHeight("-1");
    	$client->setNoMargins(true);
	    $client->convertUrlToFile('http://157.230.32.185/qwertyCV/?user='.$userId, $path);

	    header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($path));
		header('Accept-Ranges: bytes');
	    @readfile($path);
	}
	catch(\Pdfcrowd\Error $why)
	{
	    error_log("Pdfcrowd Error: {$why}\n");
	    throw $why;
	}
	exit(200);
}
