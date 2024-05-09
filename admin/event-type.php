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
	<title>Media | Event Type</title>

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

					$rsData = $Q_obj->getRecords('media_types', $id);
					if (count($rsData) > 0) :
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Edit Event Type</h2>
							</div>
							<div><a href="view-video.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionForm" action="query.php" method="POST">
											<input type="hidden" name="media_category" value="category">
											<input type="hidden" value="<?= $rsData[0]['id']; ?>" name="id">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-12 form-group">
														<label>Media Type <sup>*</sup></label>
														<select name="types" class="form-control" required>
															<option value="">Select Type</option>
															<option value="gallery" <?php echo (('gallery' == $rsData[0]['types']) ? 'selected="selected"' : ''); ?>>Gallery</option>
															<option value="video" <?php echo (('video' == $rsData[0]['types']) ? 'selected="selected"' : ''); ?>>Video</option>
														</select>
														<div class="Inpt types"></div>
													</div>
													<div class="col-md-12 form-group">
														<label>Event Type Name <sup>*</sup></label>
														<input type="text" maxlength="100" name="type_name" value="<?= $rsData[0]['type_name']; ?>" class="form-control">
														<div class="Inpt type_name"></div>
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
								<h2 class="main-content-title tx-24 mg-b-5">New Event Type</h2>
							</div>
							<div><a href="view-video.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<form class="actionForm" action="query.php" method="POST">
											<input type="hidden" name="media_category" value="category">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-12 form-group">
													<label>Media Type <sup>*</sup></label>
														<select name="types" class="form-control" required>
															<option value="">Select Type</option>
															<option value="gallery">Gallery</option>
															<option value="video">Video</option>
														</select>
														<div class="Inpt types"></div>
													</div>
													<div class="col-md-12 form-group">
														<label>Event Type Name <sup>*</sup></label>
														<input type="text" maxlength="100" name="type_name" class="form-control">
														<div class="Inpt type_name"></div>
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

	<?php include "lib/footer_link1.php"; ?>
</body>

</html>