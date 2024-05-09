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
	<title>Media | Gallery</title>

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

					$rsData = $Q_obj->getRecords('galleries', $id);
					if (count($rsData) > 0) :

						$media_image = (isset($rsData[0]['attached_file']) && file_exists('../assets/uploads/' . $rsData[0]['attached_file'])) ? '../assets/uploads/' . $rsData[0]['attached_file'] : 'assets/img/dummy.png';
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Edit Media Gallery</h2>
							</div>
							<div><a href="view-gallery.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="gallery_edit" value="gallery">
											<input type="hidden" value="<?= $rsData[0]['id']; ?>" name="id">
											<input type="hidden" value="<?= $rsData[0]['attached_file']; ?>" name="hidimage">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-6 image-upload">
														<label>Gallery Image</label>
														<label for="file" id="uploaded_image">
															<img src="<?= $media_image; ?>" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
														</label>
														<input id="file" type="file" name="attached_file" onchange="preview_image(event)" />
														<div class="Inpt attached_file"></div>
													</div>
													<div class="col-md-6 form-group">
														<div class="row">

															<div class="col-md-6 form-group">
																<label>Event Type <sup>*</sup></label>
																<select name="media_type_id" class="form-control" required>
																	<?php echo $Q_obj->getMediaTypeDropdown('gallery', $rsData[0]['media_type_id']); ?>
																</select>
																<div class="Inpt media_type"></div>
															</div>
															<div class="col-md-6 form-group">
																<label>Photo Sorting <sup>*</sup></label>
																<input type="text" maxlength="3" name="photo_sorting" value="<?= $rsData[0]['photo_sorting']; ?>" class="form-control TypeInt">
																<div class="Inpt photo_sorting"></div>
															</div>
															<div class="col-md-12 form-group">
																<label>Photo Title <sup>*</sup></label>
																<input type="text" maxlength="200" name="photo_title" value="<?= $rsData[0]['photo_title']; ?>" class="form-control">
																<div class="Inpt photo_title"></div>
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
								<h2 class="main-content-title tx-24 mg-b-5">New Media Gallery</h2>
							</div>
							<div><a href="view-gallery.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="gallery_create" value="gallery">
											<input type="hidden" value="" name="hidimage">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-6 image-upload">
														<label>Gallery Image</label>
														<label for="file" id="uploaded_image">
															<img src="assets/img/dummy.png" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
														</label>
														<input id="file" type="file" multiple name="attached_file[]" accept="image/jpg,image/png,image/jpeg,image/gif" onchange="preview_image(event)" />
														<div class="Inpt attached_file"></div>
													</div>
													<div class="col-md-6 form-group">
														<div class="row">

															<div class="col-md-6 form-group">
																<label>Event Type <sup>*</sup></label>
																<select name="media_type_id" class="form-control eventype" required>
																	<?php echo $Q_obj->getMediaTypeDropdown('gallery'); ?>
																</select>
																<div class="Inpt media_type"></div>
															</div>
															<div class="col-md-6 form-group">
																<label>Photo Sorting <sup>*</sup></label>
																<input type="text" maxlength="3" name="photo_sorting" class="form-control TypeInt psorting">
																<div class="Inpt photo_sorting"></div>
															</div>
															<div class="col-md-12 form-group">
																<label>Photo Title <sup>*</sup></label>
																<input type="text" maxlength="200" name="photo_title" class="form-control">
																<div class="Inpt photo_title"></div>
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

	<?php include "lib/footer_link1.php";
	if (count($rsData) == 0) :
	?>
		<script>
			$(".eventype").click(function() {
				var eventype = $(".eventype").val();
				$.ajax({
					url: 'query.php?mediasort=gallery&eventype='+eventype,
					type: 'GET',
					dataType: 'json',
					success: function(response) {
						if (response.status === 'success') {
							$(".psorting").val(response.data);
						} else {
							$(".psorting").val('');
						}
					},
					error: function() {
						$(".psorting").val('');
					}
				});
			});
		</script>
	<?php endif; ?>

</body>

</html>