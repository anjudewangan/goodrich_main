<?php

require_once(dirname(__DIR__) . '/includes/connection_inner.php');

$today = date("Y-m-d");


//-------Login------------
if (isset($_POST['login'])) {

	if (empty($_POST["user"])) {

		echo json_encode(array("class_name" => 'user', "error" => "Please enter username"));
		exit;
	} elseif (empty($_POST["password"])) {

		echo json_encode(array("class_name" => 'password', "error" => "Please enter password"));
		exit;
	} else {

		$admin_log = $Q_obj->AdminLogin($_POST);

		if (count($admin_log) > 0) {
			$_SESSION['godrichid'] = $admin_log[0]['id'];
			$_SESSION['godrichuser'] = $admin_log[0]['username'];

			$msg = 'Logging success into admin site, wait for one moment please...';
			echo json_encode(array("class_name" => 'success', "msg" => $msg, "urlpg" => 'dashboard.php'));
			exit;
		} else {
			echo json_encode(array("class_name" => 'user', "error" => "Invalid Username and Password"));
			exit;
		}
	}
}

//-------Login------------
if (isset($_POST['changepass'])) {
	if (empty($_POST["cpass"])) {

		echo json_encode(array("class_name" => 'cpass', "error" => "Please enter current password"));
		exit;
	} elseif (empty($_POST["npass"])) {

		echo json_encode(array("class_name" => 'npass', "error" => "Please enter new password"));
		exit;
	} elseif (empty($_POST["rpass"])) {

		echo json_encode(array("class_name" => 'rpass', "error" => "Please enter confirm password"));
		exit;
	} else {

		$CheckPass = $Q_obj->CurrentPassword($_POST['cpass']);

		if ($CheckPass > 0) {

			if (strlen($_POST['npass']) < 6) {
				echo json_encode(array("class_name" => 'npass', "error" => "Password can not be less than 6 charecters"));
				exit;
			} elseif ($_POST['npass'] != $_POST['rpass']) {
				echo json_encode(array("class_name" => 'rpass', "error" => "New Password does not match"));
				exit;
			} else {
				$Q_obj->AdminPasswordEdit($_POST);
				$msg = 'Password Successfully Updated!';
				echo json_encode(array("class_name" => 'successaccess', "msg" => $msg, "purl" => ''));
				exit;
			}
		} else {
			echo json_encode(array("class_name" => 'cpass', "error" => "Please enter correct old password"));
			exit;
		}
	}
}

//----------Delete--records----------------------
if ($_POST["action"] == "delete" && !empty($_POST["tablname"]) && !empty($_POST["id"])) {
	$response = $Q_obj->getRecords($_POST["tablname"], $_POST["id"]);
	if (count($response) > 0) {
		// Delete the file
		if (isset($response[0]["attached_file"])) {
			$path = dirname(__DIR__) . '/assets/uploads/' . $response[0]["attached_file"];
			if (file_exists($path)) {
				unlink($path);
			}
		}

		$Q_obj->DeleteRecords($_POST["tablname"], $_POST["id"]);
		echo "Deleted Successfully!";
	} else {
		echo 'Something Went Wrong!';
	}
	exit;
}

//---------Media Gallery----------
if (isset($_POST['gallery_create'])) {

	// Check if files were uploaded
	if (empty($_FILES["attached_file"]["name"][0])) {

		echo json_encode(array("class_name" => 'attached_file', "error" => "Please upload a gallery photo"));
		exit;
	} elseif (empty($_POST["photo_title"])) {

		echo json_encode(array("class_name" => 'photo_title', "error" => "Please enter photo title"));
		exit;
	} elseif (empty($_POST["media_type_id"])) {

		echo json_encode(array("class_name" => 'media_type', "error" => "Please select event type"));
		exit;
	} elseif (empty($_POST["photo_sorting"])) {

		echo json_encode(array("class_name" => 'photo_sorting', "error" => "Please enter photo sorting no."));
		exit;
	} else {

		$valid_extensions = array('webp', 'jpeg', 'jpg', 'png');

		//$max_size = 1 * 1024 * 1024; // 1MB
		$max_size = 100 * 1024; // 100kb

		$attached_file = $_FILES['attached_file'];
		$upload_errors = array();
		$target_dir = "../assets/uploads/gallery/";

		foreach ($attached_file['tmp_name'] as $key => $tmp_name) {
			$file_name = $attached_file['name'][$key];
			$file_tmp = $attached_file['tmp_name'][$key];
			$file_size = $attached_file['size'][$key];
			$file_type = $attached_file['type'][$key];
			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

			// Check if file is empty
			if ($file_size == 0) {
				$upload_errors[] = "File is empty: $file_name";
				continue;
			}

			// Check file type
			if (!in_array($file_ext, $valid_extensions)) {
				$upload_errors[] = "File type not allowed: $file_name";
				continue;
			}

			// Check file size
			if ($file_size > $max_size) {
				$upload_errors[] = "File too large: $file_name";
				continue;
			}

			// Move file to upload directory
			$photo_name = $file_name;
			$target_file = $target_dir . basename($photo_name);
			move_uploaded_file($file_tmp, $target_file);

			//----Insert Data for Gallery---------
			$_POST["photo_sorting"] = $_POST["photo_sorting"] + $key;
			$_POST["attached_file"] = 'gallery/' . $photo_name;
			$Q_obj->Media_GallerySubmitUpdate($_POST);
		}

		// Prepare JSON response
		if (!empty($upload_errors)) {
			$response = array("class_name" => 'attached_file', "error" => $upload_errors);
		} else {
			$response = array("class_name" => '', "purl" => 'view-gallery.php', "msg" => 'Successfully data saved!');
		}
		echo json_encode($response);
		exit;
	}
}

//---------Media Gallery----------
if (isset($_POST['gallery_edit'])) {

	if (empty($_FILES["attached_file"]["name"]) && empty($_POST["hidimage"])) {

		echo json_encode(array("class_name" => 'attached_file', "error" => "Please upload a gallery photo"));
		exit;
	} elseif (empty($_POST["photo_title"])) {

		echo json_encode(array("class_name" => 'photo_title', "error" => "Please enter photo title"));
		exit;
	} elseif (empty($_POST["media_type_id"])) {

		echo json_encode(array("class_name" => 'media_type', "error" => "Please select event type"));
		exit;
	} elseif (empty($_POST["photo_sorting"])) {

		echo json_encode(array("class_name" => 'photo_sorting', "error" => "Please enter photo sorting no."));
		exit;
	} else {

		// Check if a file was uploaded
		if (isset($_FILES["attached_file"]["name"]) && !empty($_FILES["attached_file"]["name"])) {

			$filename = $_FILES["attached_file"]['name'];
			$file_size = $_FILES["attached_file"]['size'];
			$target_dir = "../assets/uploads/gallery/";
			$max_size = 100 * 1024; // 100kb
			$allowed_extensions = array("webp", "jpg", "jpeg", "png");

			$file_extension = strtolower(pathinfo($_FILES["attached_file"]["name"], PATHINFO_EXTENSION));

			// Check if the file extension is allowed
			if (!in_array($file_extension, $allowed_extensions)) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only PNG, JPG, webp and JPEG files are allowed."));
				//echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only webp file is allowed."));
				exit;
				// Check file size
			} else if ($file_size > $max_size) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "File too large: $filename"));
				exit;
			} else {
				// Upload file if everything is ok
				$file_name = 'goodrich' . round(microtime(true)) . '.' . $file_extension;
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file);
				$_POST["attached_file"] = 'gallery/' . $file_name;
				//------unlink image
				if (!empty($_POST["hidimage"])) {
					$path = '../assets/uploads/' . $_POST["hidimage"];
					if (file_exists($path)) {
						unlink($path);
					}
				}
			}
		}

		//----Insert/Update Data for Gallery---------
		$Q_obj->Media_GallerySubmitUpdate($_POST);

		echo json_encode(array("class_name" => '', "purl" => 'view-gallery.php', "msg" => 'Successfully data saved!'));

		exit;
	}
}

//---------Media Video----------
if (isset($_POST['media_video'])) {

	if (empty($_POST["video_url"])) {

		echo json_encode(array("class_name" => 'video_url', "error" => "Please enter video url"));
		exit;
	} elseif (empty($_POST["media_type_id"])) {

		echo json_encode(array("class_name" => 'media_type', "error" => "Please select event type"));
		exit;
	} elseif (empty($_POST["video_sorting"])) {

		echo json_encode(array("class_name" => 'photvideo_sortingo_sorting', "error" => "Please enter video sorting no."));
		exit;
	} elseif (empty($_POST["video_title"])) {

		echo json_encode(array("class_name" => 'video_title', "error" => "Please enter video title"));
		exit;
	} else {

		//----Insert/Update Data for Video---------
		$Q_obj->Media_VideoSubmitUpdate($_POST);

		echo json_encode(array("class_name" => '', "purl" => 'view-video.php', "msg" => 'Successfully data saved!'));

		exit;
	}
}


//---------Bload Create/Update----------
if (isset($_POST['blog'])) {

	if (empty($_POST["blog_date"])) {

		echo json_encode(array("class_name" => 'blog_date', "error" => "Please select blog date"));
		exit;
	} elseif (empty($_POST["title"])) {

		echo json_encode(array("class_name" => 'title', "error" => "Please enter blog title"));
		exit;
	} elseif (empty($_FILES["attached_file"]["name"]) && empty($_POST["hidimage"])) {

		echo json_encode(array("class_name" => 'attached_file', "error" => "Please upload a blog photo"));
		exit;
	} else {

		// Check if a file was uploaded
		if (isset($_FILES["attached_file"]["name"]) && !empty($_FILES["attached_file"]["name"])) {

			$filename = $_FILES["attached_file"]['name'];
			$file_size = $_FILES["attached_file"]['size'];
			$max_size = 100 * 1024; // 100kb
			$target_dir = "../assets/uploads/blog/";
			$allowed_extensions = array("webp", "jpg", "jpeg", "png");
			
			$file_extension = strtolower(pathinfo($_FILES["attached_file"]["name"], PATHINFO_EXTENSION));

			// Check if the file extension is allowed
			if (!in_array($file_extension, $allowed_extensions)) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only PNG, JPG, webp and JPEG files are allowed."));
				//echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only webp file is allowed."));
				exit;
				// Check file size
			} else if ($file_size > $max_size) {
				echo json_encode(array("class_name" => 'attached_file', "error" => "File too large: $filename"));
				exit;
			} else {
				// Upload file if everything is ok
				$file_name = 'goodrich' . round(microtime(true)) . '.' . $file_extension;
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file);
				$_POST["attached_file"] = 'blog/' . $file_name;
				//------unlink image
				if (!empty($_POST["hidimage"])) {
					$path = '../assets/uploads/' . $_POST["hidimage"];
					if (file_exists($path)) {
						unlink($path);
					}
				}
			}
		}

		//----Insert/Update Data for Blog---------
		$_POST["slug"] = url_slug($_POST["title"]);
		$Q_obj->BlogSubmitUpdate($_POST);

		echo json_encode(array("class_name" => '', "purl" => 'view-blog.php', "msg" => 'Successfully data saved!'));

		exit;
	}
}

//---------Banner----------
if (isset($_POST['banner'])) {

	// Maximum file size in bytes (200KB)
	$maxFileSize = 200 * 1024;

	// Required image resolution (width x height) in pixels
	$requiredWidth = 1920;
	$requiredHeight = 1080;

	if (empty($_FILES["attached_file"]["name"]) && empty($_POST["hidimage"])) {

		echo json_encode(array("class_name" => 'attached_file', "error" => "Please upload a banner"));
		exit;
	} elseif (empty($_POST["banner_type"])) {

		echo json_encode(array("class_name" => 'banner_type', "error" => "Please select banner type"));
		exit;
	} else {

		// Check if a file was uploaded
		if (isset($_FILES["attached_file"]["name"]) && !empty($_FILES["attached_file"]["name"])) {


			if (!is_dir('../assets/uploads/video-photo')) {
				mkdir('../assets/uploads/video-photo', 0777, true);
			}

			$fileTmpName = $_FILES['attached_file']['tmp_name'];
			$fileSize = $_FILES['attached_file']['size'];
			// Get the image dimensions
			$imageInfo = @getimagesize($fileTmpName);
			$imageWidth = $imageInfo[0];
			$imageHeight = $imageInfo[1];

			$target_dir = "../assets/uploads/video-photo/";
			//$allowed_image = array("webp");
			$allowed_image = array("webp", "jpg", "jpeg", "png");
			$allowed_video = array("mp4");

			$file_extension = strtolower(pathinfo($_FILES["attached_file"]["name"], PATHINFO_EXTENSION));


			// Check if the file extension is allowed
			if (!in_array($file_extension, $allowed_image) && $_POST["banner_type"] == 'image') {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only PNG, JPG, webp and JPEG files are allowed."));
				exit;
			} elseif (!in_array($file_extension, $allowed_video) && $_POST["banner_type"] == 'video') {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Sorry, only mp4 file is allowed."));
				exit;
				// Validate file size
			} elseif (($fileSize > $maxFileSize) && $_POST["banner_type"] == 'image') {
				echo json_encode(array("class_name" => 'attached_file', "error" => "File size is too large (maximum is 200KB)."));
				exit;
				// Validate image resolution
			} elseif (($imageWidth != $requiredWidth || $imageHeight != $requiredHeight) && $_POST["banner_type"] == 'image') {
				echo json_encode(array("class_name" => 'attached_file', "error" => "Image resolution must be $requiredWidth x $requiredHeight."));
				exit;
			} else {
				// Upload file if everything is ok
				$file_name = 'goodrich' . round(microtime(true)) . '.' . $file_extension;
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file);
				$_POST["attached_file"] = 'video-photo/' . $file_name;
				//------unlink image
				if (!empty($_POST["hidimage"])) {
					$path = '../assets/uploads/' . $_POST["hidimage"];
					if (file_exists($path)) {
						unlink($path);
					}
				}
			}
		}

		//----Insert/Update Data for Banner---------
		$Q_obj->BannerSubmitUpdate($_POST);

		echo json_encode(array("class_name" => '', "purl" => 'view-banner.php', "msg" => 'Successfully data saved!'));

		exit;
	}
}

//---------Media Event Type----------
if (isset($_POST['media_category'])) {

	if (empty($_POST["types"])) {

		echo json_encode(array("class_name" => 'types', "error" => "Please select media type"));
		exit;
	} elseif (empty($_POST["type_name"])) {

		echo json_encode(array("class_name" => 'type_name', "error" => "Please enter event type name"));
		exit;
	} else {

		//----Insert/Update Data for Video---------
		$Q_obj->Media_EventTypeSubmitUpdate($_POST);

		echo json_encode(array("class_name" => '', "purl" => 'view-event-types.php', "msg" => 'Successfully data saved!'));

		exit;
	}
}

//---------Media Gallery Sorting----------
if (isset($_GET['mediasort']) && $_GET['mediasort'] == 'gallery') {
	if ($_GET['eventype'] != null) {
		$data = ($Q_obj->getGallerySorting($_GET['eventype']) != null) ? $Q_obj->getGallerySorting($_GET['eventype']) : 1;
	} else {
		$data = '';
	}
	echo json_encode(array('status' => 'success', 'data' => $data));
	exit;
}

//---------Media Video Sorting----------
if (isset($_GET['mediasort']) && $_GET['mediasort'] == 'video') {
	if ($_GET['eventype'] != null) {
		$data = ($Q_obj->getVideoSorting($_GET['eventype']) != null) ? $Q_obj->getVideoSorting($_GET['eventype']) : 1;
	} else {
		$data = '';
	}
	echo json_encode(array('status' => 'success', 'data' => $data));
	exit;
}

/**
 * Prepare the url_slug.
 */
function url_slug($feilds)
{
	return strtolower(strip_tags(trim(preg_replace(
		'~[^0-9A-Za-z]+~i',
		'-',
		html_entity_decode(preg_replace(
			'~&([A-Za-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i',
			'$1',
			htmlentities(preg_replace('/[&]/', ' and ', $feilds), ENT_QUOTES, 'UTF-8')
		), ENT_QUOTES, 'UTF-8')
	), '-')));
}
