<?php
if($_SESSION['user_type'] == 'CSM'){

	$this->load->view('layouts/header.php');
	$this->load->view('layouts/sidebar.php');
	?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Add Sales Target</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Add Sales Target</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="row">  <!-- /.col -->
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<form method="post" action="insert_sales_target" enctype="multipart/form-data">

								<div class="form-group">
<!--									--><?php
//									$mindate = date('Y-m');
//									?>
									<input type="month" id="month" name="month" class="form-control"/>
								</div>
<!--							<a href="--><?php //echo base_url("index.php/Admin/add_category")?><!--" class="btn btn-success float-right" style="color: white">Add Sales Target</a>-->
						</div>
						<div class="col-md-2">

						</div>
						<div class="col-md-7">
						</div>
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
						<?php }  if($message = $this->session->flashdata('existed')){?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-danger">
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
								<h3 class="card-title">Add Sales Target</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Product</th>
												<th>Sales</th>
											</tr>
											</thead>
											<tbody>

											<?php if($product){
												foreach($product as $pro){ ?>
													<tr>
														<td>
															<input type="hidden" name="productid[]" value="<?= $pro->id ?>"  />
															<?= $pro -> description ?></td>
														<td><input name="sales[]" type="text"/></td>
													</tr>
												<?php } }?>

											</tbody>
										</table>
										<div class="float-right">
											<?php
											$formsubmitdata = array('class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit');
											echo form_submit($formsubmitdata); ?>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<!-- /.row -->
					</div><!-- /.container-fluid -->
		</section>
		<!-- Main content -->
		<!-- /.content -->
	</div>

	<?php
	$this->load->view('layouts/footer.php');

}else{
	redirect('Login/index');
} ?>
