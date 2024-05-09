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
	<title>Goodrich | Manage Careers</title>

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
							<h2 class="main-content-title tx-24 mg-b-5">Manage Careers</h2>
							<div class="alertmsg"></div>
						</div>
						<div>
							<form method="post" action="careers-export.php">
								<button type="submit" href="" class="btn btn-primary btn-icon-text"><i class="fe fe-download"></i> Export data</button>
							</form>
						</div>
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
													<th>Name</th>
													<th>Town/City</th>
													<th>Address</th>
													<th>Zip Code</th>
													<th>Country</th>
													<th>Phone</th>
													<th>Email</th>
													<th>Job Title</th>
													<th>About us</th>
													<th>Attached File</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$rsData = $Q_obj->CareersList();
												if (count($rsData) > 0) {
													foreach ($rsData as $record) {
												?>
														<tr>
															<td><?= $record['id']; ?></td>
															<td><?= $record['name'] . ' ' . $record['surname']; ?></td>
															<td><?= $record['city']; ?></td>
															<td><?= $record['address']; ?></td>
															<td><?= $record['zipcode']; ?></td>
															<td><?= $record['country']; ?></td>
															<td><?= $record['phone']; ?></td>
															<td><?= $record['email']; ?></td>
															<td><?= $record['tob_title']; ?></td>
															<td><?php echo wordwrap($record['about_us'], 30, "<br>"); ?></td>
															<td><?php echo (isset($record['attached_file']) && $record['attached_file'] != null) ? '<a target="_blank" href="../assets/uploads/' . $record['attached_file'] . '">Attached file</a>' : ''; ?></td>
															<td><?= date("d M, Y", strtotime($record['created_at'])); ?></td>
															<td>
																<div class="btn-icon-list">
																	<a style="cursor:pointer;" onclick="return deleteconfig('<?= $record['id']; ?>','careers')" class="btn btn-danger btn-icon"><i class="fa fa-trash"></i></a>
																</div>
															</td>
														</tr>
													<?php } ?>
												<?php } ?>

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