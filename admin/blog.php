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
	<title>Goodrich | Blog</title>

	<?php include "lib/header_link.php"; ?>

	<script src="ckeditor/ckeditor.js"></script>

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
					<div id="bloadpost" class="All-loader" style="display:none">
						<div class="loader"><i class="fa fa-spinner fa-pulse fa-1x"></i></div>
					</div>

					<?php
					if (isset($_REQUEST['id'])) :
						$id = $_REQUEST['id'];
					else :
						$id = '';
					endif;

					$rsData = $Q_obj->getRecords('blogs', $id);
					if (count($rsData) > 0) :

						$media_image = (isset($rsData[0]['attached_file']) && file_exists('../assets/uploads/' . $rsData[0]['attached_file'])) ? '../assets/uploads/' . $rsData[0]['attached_file'] : 'assets/img/dummy.png';
					?>
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Edit Blog</h2>
							</div>
							<div><a href="view-blog.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionBlogForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="blog" value="blog">
											<input type="hidden" value="<?= $rsData[0]['id']; ?>" name="id">
											<input type="hidden" value="<?= $rsData[0]['attached_file']; ?>" name="hidimage">
											<div class="">
												<div class="row">
													<div class="col-md-4 form-group">
														<label>Date <sup>*</sup></label>
														<input type="date" name="blog_date" value="<?php echo $rsData[0]['blog_date']; ?>" class="form-control" required>
														<div class="Inpt blog_date"></div>
													</div>
													<div class="col-md-8 form-group">
														<label>Title <sup>*</sup></label>
														<input type="text" maxlength="255" name="title" value="<?php echo $rsData[0]['title']; ?>" class="form-control" required>
														<div class="Inpt title"></div>
													</div>

													<div class="col-md-12 form-group">
														<label>External Blog URL</label>
														<input type="text" maxlength="255" name="external_url" value="<?= $rsData[0]['external_url']; ?>" class="form-control">
													</div>
													<div class="col-md-12 form-group">
														<label>Description</label>
														<textarea name="blog_description" class="form-control ckeditor" rows="5"><?= $rsData[0]['blog_description']; ?></textarea>
													</div>

													<div class="col-md-4 form-group image-upload">
														<label>Blog Image</label>
														<label for="file" id="uploaded_image">
															<img src="<?= $media_image; ?>" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
														</label>
														<input id="file" type="file" name="attached_file" onchange="preview_image(event)" />
														<div class="Inpt attached_file"></div>
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
								<h2 class="main-content-title tx-24 mg-b-5">New Blog</h2>
							</div>
							<div><a href="view-blog.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">

										<form class="actionBlogForm" action="query.php" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="blog" value="blog">
											<input type="hidden" value="" name="hidimage">
											<div class="">
												<div class="row">
													<div class="col-md-4 form-group">
														<label>Date <sup>*</sup></label>
														<input type="date" name="blog_date" class="form-control" required>
														<div class="Inpt blog_date"></div>
													</div>
													<div class="col-md-8 form-group">
														<label>Title <sup>*</sup></label>
														<input type="text" maxlength="255" name="title" class="form-control" required>
														<div class="Inpt title"></div>
													</div>

													<div class="col-md-12 form-group">
														<label>External Blog URL</label>
														<input type="text" maxlength="255" name="external_url" class="form-control">
													</div>
													<div class="col-md-12 form-group">
														<label>Description</label>
														<textarea name="blog_description" class="form-control ckeditor" rows="5"></textarea>
													</div>

													<div class="col-md-4 form-group image-upload">
														<label>Blog Image</label>
														<label for="file" id="uploaded_image">
															<img src="assets/img/dummy.png" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
														</label>
														<input id="file" type="file" name="attached_file" onchange="preview_image(event)" />
														<div class="Inpt attached_file"></div>
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
	<script src="assets/js/blog.js"></script>

</body>

</html>