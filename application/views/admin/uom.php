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
							<li class="breadcrumb-item active">Unit Of Measure</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="container-fluid">
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
							<?php if(isset($singlerecorduom)){?>
							<?php foreach ($singlerecorduom as $uomrecord){?>
							<div class="card-header">
								<h3 class="card-title">Edit Unit Of Measure</h3>
							</div>
							<?php echo form_open('Admin/update_uom'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-10">
										<?php
										echo form_hidden('id', $uomrecord->id);
										?>
										<div class="form-group">
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'unit_of_measure', 'name' => 'unit_of_measure',
												'placeholder' => 'Enter Unit Of Measure', 'value' => $uomrecord->unit_of_measure
											);
											echo form_input($title);
											?>

										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?php  $formsubmitdata = array('class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit');
											echo form_submit($formsubmitdata);
											?>
										</div>
									</div>
								</div>
								<?php } ?>
								</form>
								<?php }else{ ?>
								<div class="card-header">
									<h3 class="card-title">Add Unit Of Measure</h3>
								</div>
								<?php echo form_open('Admin/insert_uom'); ?>
								<div class="card-body">
									<div class="row">
										<div class="col-md-10">
											<div class="form-group">
												<?php
												$title = array('type' => 'text', 'class' => 'form-control',
													'id' => 'unit_of_measure', 'name' => 'unit_of_measure',
													'placeholder' => 'Enter Unit Of Measure'
												);
												echo form_input($title);
												?>

											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<?php  $formsubmitdata = array('class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit');
												echo form_submit($formsubmitdata);
												?>
											</div>
										</div>
									</div>
									</form>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-1"></div>
							<!-- /.row -->
						</div><!-- /.container-fluid -->
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">All Unit Of Measure</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Unit Of Measure</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
											</thead>
											<tbody>
											<?php if($uom){
												foreach($uom as $u){ ?>
													<tr>
														<td><?= $u -> unit_of_measure ?></td>
														<td><a href="<?= base_url('index.php/Admin/edit_uom/');echo $u -> id ?>" class="fa fa-edit" style="color: orange"></a> </td>
														<td><a href="<?= base_url('index.php/Admin/delete_uom/');echo $u -> id ?>" class="fa fa-trash" style="color: red"></a></td>
													</tr>
												<?php } }?>
											</tbody>
										</table>
									</div>
								</div>
								</form>
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
