<?php
require_once(dirname(__DIR__, 2) . '/includes/connection_inner.php');

//--------Contact us Submit-------
if (isset($_POST["btnform"]) && $_POST["btnform"] == 'contact') {
	$emailformat = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	$txtEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mobileformat = '/^[0-9]{10}+$/';
	$txtMobile = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
	$maxFileSize = 3 * 1024 * 1024; // 3MB in bytes

	if (empty($_POST["fullname"])) {

		echo json_encode(array("class_name" => 'fullname', "error" => "Please enter your name"));
		exit;
	} elseif (empty($txtEmail)) {

		echo json_encode(array("class_name" => 'email', "error" => "Please enter your email id"));
		exit;
	} elseif (!preg_match($emailformat, $txtEmail) && !empty($txtEmail)) {

		echo json_encode(array("class_name" => 'email', "error" => "Please enter valid email id"));
		exit;
	} elseif (empty($_POST["country"])) {

		echo json_encode(array("class_name" => 'country', "error" => "Please select country"));
		exit;
	} elseif (empty($txtMobile)) {

		echo json_encode(array("class_name" => 'phone', "error" => "Please enter phone Number"));
		exit;
	} elseif (!preg_match($mobileformat, $txtMobile) && !empty($txtMobile)) {

		echo json_encode(array("class_name" => 'phone', "error" => "Phone number must be equal to 10 digit"));
		exit;
	} elseif (empty($_POST["company_name"])) {

		echo json_encode(array("class_name" => 'company_name', "error" => "Please enter company name"));
		exit;
	} elseif (empty($_POST["contact_message"])) {

		echo json_encode(array("class_name" => 'contact_message', "error" => "Please write your message"));
		exit;
	} else {

		// Check if a file was uploaded
		if (isset($_FILES["attached_file"]["name"]) && !empty($_FILES["attached_file"]["name"])) {

			$target_dir = "../../assets/uploads/contact/";
			$allowed_extensions = array("jpg", "png", "doc", "docx", "pdf");

			$file_extension = strtolower(pathinfo($_FILES["attached_file"]["name"], PATHINFO_EXTENSION));

			// Check if the file extension is allowed
			if (!in_array($file_extension, $allowed_extensions)) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only JPG, PNG, DOC, DOCX, PDF files are allowed."));
				exit;
			} elseif ($_FILES["attached_file"]["size"] > $maxFileSize) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "File is too large. Max file size is 3MB."));
				exit;
			} else {
				// Upload file if everything is ok
				$file_name = 'goodrich' . round(microtime(true)) . '.' . $file_extension;
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file);
				$_POST["attached_file"] = 'contact/' . $file_name;
			}
		}

		//----Insert Data for Contact---------
		$Q_obj->ConatctSubmit($_POST);

		echo json_encode(array("class_name" => '', "purl" => '', "msg" => 'Thank you! We have received your message. Check out our delicious potato cereals while we respond shortly!'));

		exit;
	}
}

//--------Career Submit-------
if (isset($_POST["btnform"]) && $_POST["btnform"] == 'career') {
	$emailformat = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	$txtEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mobileformat = '/^[0-9]{10}+$/';
	$txtMobile = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
	$maxFileSize = 3 * 1024 * 1024; // 3MB in bytes

	if (empty($_POST["name"])) {

		echo json_encode(array("class_name" => 'name', "error" => "Please enter your name"));
		exit;
	} elseif (empty($_POST["surname"])) {

		echo json_encode(array("class_name" => 'surname', "error" => "Please enter your surname"));
		exit;
	} elseif (empty($_POST["city"])) {

		echo json_encode(array("class_name" => 'city', "error" => "Please enter town/city"));
		exit;
	} elseif (empty($_POST["country"])) {

		echo json_encode(array("class_name" => 'country', "error" => "Please select country"));
		exit;
	} elseif (empty($_POST["address"])) {

		echo json_encode(array("class_name" => 'address', "error" => "Please enter address"));
		exit;
	} elseif (empty($_POST["zipcode"])) {

		echo json_encode(array("class_name" => 'zipcode', "error" => "Please enter zip code"));
		exit;
	} elseif (empty($txtMobile)) {

		echo json_encode(array("class_name" => 'phone', "error" => "Please enter phone Number"));
		exit;
	} elseif (!preg_match($mobileformat, $txtMobile) && !empty($txtMobile)) {

		echo json_encode(array("class_name" => 'phone', "error" => "Phone number must be equal to 10 digit"));
		exit;
	} elseif (empty($txtEmail)) {

		echo json_encode(array("class_name" => 'email', "error" => "Please enter your email id"));
		exit;
	} elseif (!preg_match($emailformat, $txtEmail) && !empty($txtEmail)) {

		echo json_encode(array("class_name" => 'email', "error" => "Please enter valid email id"));
		exit;
	} elseif (empty($_POST["tob_title"])) {

		echo json_encode(array("class_name" => 'tob_title', "error" => "Please enter job title"));
		exit;
	} elseif (empty($_POST["about_us"])) {

		echo json_encode(array("class_name" => 'about_us', "error" => "Please write about you"));
		exit;
	} elseif (empty($_FILES["attached_file"]["name"])) {

		echo json_encode(array("class_name" => 'attached_file', "error" => "Please upload and attached file"));
		exit;
	} else {

		// Check if a file was uploaded
		if (isset($_FILES["attached_file"]["name"]) && !empty($_FILES["attached_file"]["name"])) {

			$target_dir = "../../assets/uploads/careers/";
			$allowed_extensions = array("doc", "docx", "pdf");

			$file_extension = strtolower(pathinfo($_FILES["attached_file"]["name"], PATHINFO_EXTENSION));

			// Check if the file extension is allowed
			if (!in_array($file_extension, $allowed_extensions)) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only DOC, DOCX, PDF files are allowed."));
				exit;
			} elseif ($_FILES["attached_file"]["size"] > $maxFileSize) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "File is too large. Max file size is 3MB."));
				exit;
			} else {
				// Upload file if everything is ok
				$file_name = 'goodrich' . round(microtime(true)) . '.' . $file_extension;
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file);
				$_POST["attached_file"] = 'careers/' . $file_name;
			}
		}

		//----Insert Data for Career---------
		$Q_obj->CareersSubmit($_POST);

		echo json_encode(array("class_name" => '', "purl" => '', "msg" => 'Thank you! We have received your message. Check out our delicious potato cereals while we respond shortly!'));

		exit;
	}
}
