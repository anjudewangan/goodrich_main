<?php
require_once('../includes/connection_inner.php');

if (empty($_SESSION['godrichid'])) {
	header("Location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<!-- Title -->
	<title>Goodrich | Banners</title>

	<?php include "lib/header_link.php"; ?>

</head>

<body class="main-body leftmenu">

	<!-- Switcher -->

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


					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5"> Manage Banners</h2>
						</div>
						<div><a href="banner.php" class="btn btn-primary btn-icon-text"><i class="fe fe-plus"></i> Add New Banner</a></div>
					</div>
					<!-- End Page Header -->

					<!-- Row -->
					<div class="row row-sm">
						<div class="col-lg-12">
							<div class="card custom-card overflow-hidden">
								<div class="card-body">

									<div class="table-responsive">
										<table class="table table-bordered text-nowrap" id="example1">
											<thead>
												<tr>
													<th>ID#</th>
													<th>Banner Type</th>
													<th>Video/Image</th>
													<th>Title</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$rsData = $Q_obj->BannersList('desc');
												if (count($rsData) > 0) {
													foreach ($rsData as $record) {
												?>
														<tr>
															<td><?= $record['id']; ?></td>
															<td><?php echo ucwords($record['banner_type']); ?></td>
															<td>
																<?php
																if ($record['banner_type'] == 'video') :
																?>
																	<video muted autoplay src="../assets/uploads/<?= $record['attached_file'] ?>" style="height:200px;"></video>
																<?php else : ?>
																	<img src="../assets/uploads/<?= $record['attached_file'] ?>" style="height:200px;">
																<?php endif; ?>
															</td>
															<td><?php echo wordwrap($record['banner_title'], 80, "<br>\n"); ?></td>
															<td>
																<div class="btn-icon-list">
																	<a href="banner.php?id=<?= $record['id']; ?>" class="btn ripple btn-primary btn-icon"><i class="fa fa-edit"></i></a>
																	<a style="cursor:pointer;" onclick="return deleteconfig('<?= $record['id']; ?>','banners')" class="btn btn-danger btn-icon"><i class="fa fa-trash"></i></a>
																</div>
															</td>
														</tr>
												<?php }
												} ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div>
		</div>
		<!-- End Main Content-->

		<?php include "lib/footer.php"; ?>

	</div>
	<!-- End Page -->

	<!-- Back-to-top -->

	<?php include "lib/footer_link.php"; ?>

</body>

</html>