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
							<li class="breadcrumb-item active">Add User</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<!-- general form elements -->
						<?php if($error = $this->session->flashdata('inserted')){?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-success">
										<?php echo $error; ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Add User</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->

							<?php echo form_open('Admin/insert_user'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
								<div class="form-group">
									<label for="categorytitle">Username</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'username', 'name' => 'username',
										'placeholder' => 'Enter User Name'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="categorytitle">Email</label>
									<?php
									$title = array('type' => 'email', 'class' => 'form-control',
										'id' => 'email', 'name' => 'email',
										'placeholder' => 'Enter Email'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="categorytitle">Password</label>
									<?php
									$title = array('type' => 'password', 'class' => 'form-control',
										'id' => 'password', 'name' => 'password',
										'placeholder' => 'Enter Password'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="categorytitle">First Name</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'first_name', 'name' => 'first_name',
										'placeholder' => 'Enter First Name'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="categorytitle">Last Name</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'last_name', 'name' => 'last_name',
										'placeholder' => 'Enter Last Name'
									);
									echo form_input($title);
									?>
								</div>
									</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="categorytitle">Phone No</label>
												<?php
												$title = array('type' => 'number', 'class' => 'form-control',
													'id' => 'phone', 'name' => 'phone',
													'placeholder' => 'Enter Phone No'
												);
												echo form_input($title);
												?>
											</div>
											<div class="form-group">
												<label for="categorytitle">User Type</label>
												<select class="form-control" name="user_type_id" id="user_type_id" required>
													<option value="">Select User Type</option>
													<?php
													if($user_type){
														foreach($user_type as $utype){?>
															<option  value = "<?= $utype -> user_type_id ?>"><?= $utype -> user_type ?></option>
														<?php } } else{ ?>
														<option>No User Type Found</option>
													<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label for="categorytitle">Description</label>
													<input type="text" value="" class="form-control" id="description" name="description" placeholder="Description" readonly>
<!--												--><?php
//												$title = array('type' => 'text', 'class' => 'form-control',
//													'id' => 'description', 'name' => 'description',
//													'placeholder' => 'Enter Description'
//												);
//												echo form_input($title);
//												?>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Status</label>
												<select class="form-control" name="status" required>
													<option value="">Select Status</option>
													<option value="Enable">Enable</option>
													<option value="Disable">Disable</option>
												</select>
											</div>
											<div class="card-footer">
												<?php
												$formsubmitdata = array('class' => 'btn btn-info float-right', 'type' => 'submit', 'value' => 'Submit');
												echo form_submit($formsubmitdata); ?>
											</div>
										</div>
								</div>

								</form>
							</div>
							<div class="col-md-3"></div>

						</div>
						<!--/.col (left) -->
					</div>
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
<script>
	$(document).ready(function () {
		$('#user_type_id').change(function () {
			var user_type_id = $('#user_type_id').val();
			//console.log(region_id);
			//var q = "<?php //echo base_url();?>//index.php/Admin/get_description";
			//alert(q);
			if(user_type_id != ''){
				$.ajax({
					url: "<?php echo base_url();?>index.php/Admin/get_description",
					method: "POST",
					data: {user_type_id:user_type_id},
					success: function (data) {
						// alert(data);
						$('#description').val(data);
					}
				})
			}

		})
	})
</script>
