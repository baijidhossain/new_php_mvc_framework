<?php require_once(VIEW_PATH . '_common/header.php'); ?>

	<!--Main layout start-->

	<main>
		<div class="content-wrapper">
			<!-- Content Header (Page Header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row align-items-center my-4">
						<div class="col-sm-7">
							<h3 class="m-0"><?= $this->data['page_title'] ?></h3>
						</div>
					</div>
				</div>
			</div>
			<!-- Content Header (Page Header) End-->

			<div class="content">
				<div class="container-fluid">
					<?php $this->getMessage(); ?>
					<div class="row row-deck">
						<div class="col-sm-12 col-md-6 col-xl-3">
							<div class="card _card border-0 purple_gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="text-white m-0 fw-bold fs-4">RAM</h2>
											<h6 class="text-white">Total <span class="badge rounded-pill bg__primary mt-2"><?=
													$this->data['ramInfo'][0]['total'] ?></span></h6>
											</span></h6>
											<h6 class="text-white">Availabale <span class="badge rounded-pill bg__primary mt-2">
                                                <?=
                                                $this->data['ramInfo'][0]['available'] ?>
                                            </span></h6>
										</div>
										<div class="ms-auto">
											<span class="text-white display-3"><i class="fa-solid fa-memory"></i></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-md-6 col-xl-3">
							<div class="card _card border-0 orange_gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="text-white m-0 fw-bold fs-4">Disk</h2>
											<h6 class="text-white">Total <span class="badge rounded-pill bg__orange mt-2">
                                                <?=
                                                $this->data['diskInfo'][0]['total'] ?>
                                            </span></h6>
											<h6 class="text-white">Free <span class="badge rounded-pill bg__orange mt-2">
                                                <?=
                                                $this->data['diskInfo'][0]['free'] ?>
                                            </span></h6>
										</div>
										<div class="ms-auto">
											<span class="text-white display-3"><i class="fa-solid fa-hard-drive"></i></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-md-6 col-xl-3">
							<div class="card _card border-0 green_gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="text-white m-0 fw-bold fs-4">CPU</h2>
											<h6 class="text-white">Cpu <span class="badge rounded-pill bg__success mt-2">
                                                <?=
                                                $this->data['systemInfo']['cpuCore'] ?> Core
                                            </span></h6>
											<h6 class="text-white">Load Average <span class="badge rounded-pill bg__success mt-2">
                                                <?=
                                                $this->data['systemInfo']['loadAverage']
                                                ?>
                                            </span></h6>
										</div>
										<div class="ms-auto">
											<span class="text-white display-3"><i class="fa-solid fa-microchip"></i></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-md-6 col-xl-3">
							<div class="card _card border-0 blue_gradient">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="text-white m-0 fw-bold fs-4">Server Info</h2>
											<h6 class="text-white">IP Address <span class="badge rounded-pill bg__secondary mt-2">
                                                <?=
                                                $_SESSION['server']['ip_address'];
                                                ?>
                                            </span></h6>
											<h6 class="text-white">Uptime
												<span class="badge rounded-pill bg__secondary mt-2">
                                                <?= $this->data['systemInfo']['uptime']['days'] . ' Days ' . $this->data['systemInfo']['uptime']['hours'] . ' Hours ' . $this->data['systemInfo']['uptime']['minutes'] . ' Minutes ' ?>
                                            </span>
											</h6>
										</div>
										<div class="ms-auto">
											<span class="text-white display-3"><i class="fa-solid fa-server"></i></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card mb-4 _card">
								<div class="card-header with-border">
									<h5 class="card-title">
										Recent Activity
									</h5>
								</div>
								<!-- /.card-header -->
								<div class="card-body">

								</div>
								<!-- /.card-body -->

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<!--Main layout end-->

<?php require_once(VIEW_PATH . '_common/footer.php'); ?>