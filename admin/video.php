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
	<title>Media | Video</title>

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

					$rsData = $Q_obj->getRecords('videos', $id);
					if (count($rsData) > 0) :
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Edit Media Video</h2>
							</div>
							<div><a href="view-video.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="media_video" value="video">
											<input type="hidden" value="<?= $rsData[0]['id']; ?>" name="id">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-12 form-group">
														<label>Video URL <sup>*</sup></label>
														<input type="text" maxlength="255" name="video_url" value="<?= $rsData[0]['video_url']; ?>" class="form-control" required>
														<div class="Inpt video_url"></div>
													</div>
													<div class="col-md-6 form-group">
														<label>Event Type <sup>*</sup></label>
														<select name="media_type_id" class="form-control" required>
															<?php echo $Q_obj->getMediaTypeDropdown('video', $rsData[0]['media_type_id']); ?>
														</select>
														<div class="Inpt media_type"></div>
													</div>
													<div class="col-md-6 form-group">
														<label>Video Sorting <sup>*</sup></label>
														<input type="text" maxlength="3" name="video_sorting" value="<?= $rsData[0]['video_sorting']; ?>" class="form-control TypeInt">
														<div class="Inpt video_sorting"></div>
													</div>
													<div class="col-md-12 form-group">
														<label>Video Title <sup>*</sup></label>
														<input type="text" maxlength="200" name="video_title" value="<?= $rsData[0]['video_title']; ?>" class="form-control">
														<div class="Inpt video_title"></div>
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
								<h2 class="main-content-title tx-24 mg-b-5">New Media Video</h2>
							</div>
							<div><a href="view-video.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<form class="actionForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="media_video" value="video">
											<div class="">
												<div class="row row-sm">
													<div class="col-md-12 form-group">
														<label>Video URL <sup>*</sup></label>
														<input type="text" maxlength="255" name="video_url" class="form-control" required>
														<div class="Inpt video_url"></div>
													</div>
													<div class="col-md-6 form-group">
														<label>Event Type <sup>*</sup></label>
														<select name="media_type_id" class="form-control eventype" required>
															<?php echo $Q_obj->getMediaTypeDropdown('video'); ?>
														</select>
														<div class="Inpt media_type"></div>
													</div>
													<div class="col-md-6 form-group">
														<label>Video Sorting <sup>*</sup></label>
														<input type="text" maxlength="3" name="video_sorting" class="form-control TypeInt psorting">
														<div class="Inpt video_sorting"></div>
													</div>
													<div class="col-md-12 form-group">
														<label>Video Title <sup>*</sup></label>
														<input type="text" maxlength="200" name="video_title" class="form-control">
														<div class="Inpt video_title"></div>
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
					url: 'query.php?mediasort=video&eventype=' + eventype,
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