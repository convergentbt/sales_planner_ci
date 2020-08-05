<?php
if($_SESSION['user_type'] == 'admin'){

	$this->load->view('layouts/header.php');
	$this->load->view('layouts/sidebar.php');
	?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">All Distributors</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="row">  <!-- /.col -->
						<div class="col-md-11">
							<a href="<?php echo base_url("index.php/Admin/add_distributor")?>" class="btn btn-success float-right" style="color: white">Add Distributor</a>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<br/>
				<div class="row">
					<!-- left column -->
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<?php if($message = $this->session->flashdata('inserted')){?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-success">
										<?php echo $message; ?>
									</div>
								</div>
							</div>
						<?php }  if($message = $this->session->flashdata('deleted')){?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-success">
										<?php echo $message; ?>
									</div>
								</div>
							</div>
						<?php } if($message = $this->session->flashdata('updated')){ ?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-success">
										<?php echo $message; ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">All Distributors</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Distributor Name</th>
												<th>Region Name</th>
												<th>Country Name</th>
												<th>Exchange Rate</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php if($distributors){
												foreach($distributors as $dist){ ?>
													<tr>
														<td><?= $dist->distributor_name?></td>
														<td><?= $dist->region_title?></td>
														<td><?= $dist->country_name?></td>
														<td><?= $dist->exchange_rate?></td>
														<td><a href="<?= base_url('index.php/Admin/edit_distributor/');echo $dist -> id ?>" class="fa fa-edit" style="color: orange"></a>
															&nbsp;<a href="<?= base_url('index.php/Admin/delete_distributor/');echo $dist -> id ?>" class="fa fa-trash" style="color: red"></a></td>
													</tr>
												<?php } }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<!-- /.row -->
					</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<?php
	$this->load->view('layouts/footer.php');

}else{
	redirect('Login/index');
} ?>
