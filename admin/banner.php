<?php
require_once('../includes/connection_inner.php');

if (empty($_SESSION['godrichid'])) {
	header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<!-- Title -->
	<title>Media | Banner</title>

	<?php include "lib/header_link.php"; ?>

</head>

<body class="main-body leftmenu">

	<!-- Loader -->
	<div id="global-loader">
		<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- End Loader -->

	<!-- Page -->
	<div class="page">

		<?php include "lib/sidebar.php"; ?>

		<?php include "lib/header.php"; ?>

		<?php include "lib/mobile_header.php"; ?>

		<!-- Mobile-header closed -->
		<!-- Main Content-->
		<div class="main-content side-content pt-0">
			<div class="container-fluid">
				<div class="inner-body">
					<div id="loadpost" class="All-loader" style="display:none">
						<div class="loader"><i class="fa fa-spinner fa-pulse fa-1x"></i></div>
					</div>


					<?php
					if (isset($_REQUEST['id'])) :
						$id = $_REQUEST['id'];
					else :
						$id = '';
					endif;

					$rsData = $Q_obj->getRecords('banners', $id);
					if (count($rsData) > 0) :

						$media_image = (isset($rsData[0]['attached_file']) && file_exists('../assets/uploads/' . $rsData[0]['attached_file'])) ? '../assets/uploads/' . $rsData[0]['attached_file'] : 'assets/img/dummy.png';
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Edit Banner</h2>
							</div>
							<div><a href="view-banner.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="banner" value="banner">
											<input type="hidden" value="<?= $rsData[0]['id']; ?>" name="id">
											<input type="hidden" value="<?= $rsData[0]['attached_file']; ?>" name="hidimage">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-6 image-upload">
														<label>Banner</label>
														<label for="file" id="uploaded_image">
															<?php
															if ($rsData[0]['banner_type'] == 'video') :
															?>
																<video muted autoplay src="<?= $media_image; ?>" style="width:100%; height: auto; cursor: pointer; object-fit: cover;"></video>
															<?php else : ?>
																<img src="<?= $media_image; ?>" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
															<?php endif; ?>
														</label>
														<input id="file" type="file" name="attached_file" onchange="preview_banner(event)" />
														<div class="Inpt attached_file"></div>
													</div>
													<div class="col-md-6 form-group">
														<div class="row">

															<div class="col-md-6 form-group">
																<label>Banner Type <sup>*</sup></label>
																<select name="banner_type" class="form-control" required>
																	<option value="">Select Type</option>
																	<option value="image" <?php echo (('image' == $rsData[0]['banner_type']) ? 'selected="selected"' : ''); ?>>Image</option>
																	<option value="video" <?php echo (('video' == $rsData[0]['banner_type']) ? 'selected="selected"' : ''); ?>>Video</option>
																</select>
																<div class="Inpt banner_type"></div>
															</div>
															<div class="col-md-12 form-group">
																<label>Banner Title</label>
																<input type="text" maxlength="200" name="banner_title" value="<?= $rsData[0]['banner_title']; ?>" class="form-control">
																<div class="Inpt banner_title"></div>
															</div>
														</div>
													</div>

												</div>

												<div class="row row-sm">
													<div class="col-md-12 form-group" style="text-align: right;">
														<button type="submit" class="btn ripple btn-primary" style="width:137px">Update</button>
													</div>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
						<!-- End Row -->
					<?php
					else :
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">New Banner</h2>
							</div>
							<div><a href="view-banner.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="banner" value="banner">
											<input type="hidden" value="" name="hidimage">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-6 image-upload">
														<label>Banner</label>
														<label for="file" id="uploaded_image">
															<img src="assets/img/dummy.png" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
														</label>
														<input id="file" type="file" name="attached_file" onchange="preview_banner(event)" />
														<div class="Inpt attached_file"></div>
													</div>
													<div class="col-md-6 form-group">
														<div class="row">

															<div class="col-md-6 form-group">
																<label>Banner Type <sup>*</sup></label>
																<select name="banner_type" class="form-control" required>
																	<option value="">Select Type</option>
																	<option value="image">Image</option>
																	<option value="video">Video</option>
																</select>
																<div class="Inpt banner_type"></div>
															</div>
															<div class="col-md-12 form-group">
																<label>Banner Title</label>
																<input type="text" maxlength="200" name="banner_title" class="form-control">
																<div class="Inpt banner_title"></div>
															</div>
														</div>
													</div>

												</div>

												<div class="row row-sm">
													<div class="col-md-12 form-group" style="text-align: right;">
														<button type="submit" class="btn ripple btn-primary" style="width:137px">Submit</button>
													</div>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
						<!-- End Row -->
					<?php
					endif;
					?>

				</div>
			</div>
		</div>
		<!-- End Main Content-->

		<?php include "lib/footer.php";  ?>

	</div>
	<!-- End Page -->

	<?php include "lib/footer_link1.php";  ?>
	<script>
		function preview_banner(event) {
			var fileInput = document.getElementById('file');
			var filePath = fileInput.value;
			var allowedExtensions = /(\.mp4)$/i;
			if (allowedExtensions.exec(filePath)) {
				//Image preview
				if (fileInput.files && fileInput.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						document.getElementById('uploaded_image').innerHTML = '<video muted="" playsinline src="' + e.target.result + '" style="width:100%; height: auto; cursor: pointer; object-fit: cover;"></video>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			} else {
				//Image preview
				if (fileInput.files && fileInput.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						document.getElementById('uploaded_image').innerHTML = '<img src="' + e.target.result + '" style="width:350px; height:auto; cursor: pointer; object-fit: cover;"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
	</script>

</body>

</html>