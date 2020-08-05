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
							<li class="breadcrumb-item active">User Type</li>
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
							<?php if(isset($singlerecordusertype)){?>
							<?php foreach ($singlerecordusertype as $usertyperecord){?>
							<div class="card-header">
								<h3 class="card-title">Edit User Type</h3>
							</div>
							<?php echo form_open('Admin/update_usertype'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-5">
										<?php
										echo form_hidden('user_type_id', $usertyperecord->user_type_id);
										?>
										<div class="form-group">
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'user_type', 'name' => 'user_type',
												'placeholder' => 'Enter User_Type', 'value' => $usertyperecord->user_type
											);
											echo form_input($title);
											?>

										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
													'id' => 'description', 'name' => 'description',
													'placeholder' => 'Enter Description', 'value' => $usertyperecord->description
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
									<h3 class="card-title">Add User Type</h3>
								</div>
								<?php echo form_open('Admin/insert_usertype'); ?>
								<div class="card-body">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<?php
												$title = array('type' => 'text', 'class' => 'form-control',
													'id' => 'unit_of_measure', 'name' => 'user_type',
													'placeholder' => 'Enter User Type'
												);
												echo form_input($title);
												?>

											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<?php
												$title = array('type' => 'text', 'class' => 'form-control',
													'id' => 'unit_of_measure', 'name' => 'description',
													'placeholder' => 'Enter Description'
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
								<h3 class="card-title">All User Types</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>User Type</th>
												<th>Description</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
											</thead>
											<tbody>
											<?php if($usertype){
												foreach($usertype as $u){ ?>
													<tr>
														<td><?= $u -> user_type ?></td>
														<td><?= $u -> description ?></td>
														<td><a href="<?= base_url('index.php/Admin/edit_usertype/');echo $u -> user_type_id ?>" class="fa fa-edit" style="color: orange"></a> </td>
														<td><a href="<?= base_url('index.php/Admin/delete_usertype/');echo $u -> user_type_id ?>" class="fa fa-trash" style="color: red"></a></td>
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
