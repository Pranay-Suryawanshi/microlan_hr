<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Microlan HR</title>
	<!--favicon-->
	<link rel="icon" href="<?php echo base_url()?>assets/images/favicon-32x32.png" type="image/png" />
	<!-- <link rel="icon" href="https://microlan.in/public_assets/img/logo.png" type="image/png" /> -->
	<!-- loader-->
	<link href="<?php echo base_url()?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo base_url()?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
			<div class="row">
				<div class="col-12 col-lg-8 mx-auto">
					<div class="card radius-15 overflow-hidden">
						<div class="row g-0">
							<div class="col-xl-6">
								<div class="card-body p-5">
									<div class="text-center">
										<img src="<?php echo base_url(); ?>assets/images/logo.png" width="120" alt="">
									</div>
									<div class="">
										<div class="login-separater text-center mb-4"> <span>SIGN IN</span>
											<hr>
										</div>
										<?php if ($this->session->flashdata('msg')) { ?>
											<div class="alert alert-danger alert-dismissible">
												<a href="#" class="close" data-dismiss="alert"
													aria-label="close">&times;</a>
												<?php echo $this->session->flashdata('msg'); ?>
											</div>
										<?php } ?>
										<?php if ($this->session->flashdata('success')) { ?>
											<div class="alert alert-success alert-dismissible">
												<a href="#" class="close" data-dismiss="alert"
													aria-label="close">&times;</a>
												<?php echo $this->session->flashdata('success'); ?>
											</div>
										<?php } ?>
										<div class="form-body">
											<form class="row g-3" id="frmadminlogin" novalidate="true" method="post"
												action="<?php echo base_url(); ?>checkvalidlogin"
												onsubmit="return validate_admin_login(this);">
												<div class="col-12 form-group">
													<label for="user_id" class="form-label">Email Address</label>
													<input type="text" class="form-control" id="user_id" name="user_id"
														placeholder="Email Address">
													<label class="error" style="display:none;color:red;"></label>
												</div>
												<div class="col-12 form-group">
													<label for="password" class="form-label">Enter Password</label>
													<div class="input-group" id="show_hide_password">
														<input type="password" class="form-control border-end-0"
															id="password" name="password" placeholder="Enter Password">
														<a href="javascript:;"
															class="input-group-text bg-transparent"><i
																class="bx bx-hide"></i></a>
													</div>
													<label class="error" style="display:none;color:red;"></label>
												</div>
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary"><i
																class="bx bxs-lock-open"></i> Sign in</button>
													</div>
												</div>
												<hr>
												<div class="col-sm-12">
													<div class="new-account">
														<div class="row">
															<div class="col-sm-4">
																<img src="<?php echo base_url(); ?>assets/images/logo.png"
																	width="100%">
															</div>
															<div class="col-sm-8">
																<p style="margin-bottom: 0px"><b
																		style="font-weight: bold;color:black;font-size: 15px;">Email
																		Id - support@microlan.in </b></p>
																<p><b
																		style="font-weight: bold;color:black;font-size: 15px;">Contact
																		No. - 8422945501 </b></p>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
								<img src="<?php echo base_url()?>assets/images/login-images/login-frent-img.jpg"
									class="img-fluid" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

<!--plugins-->
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<!--Password show & hide js -->
<script>
	// Error handling functions
	function showError(message, id) {
		var errorLabel = $("#" + id).closest(".form-group").find("label.error");
		errorLabel.text(message).show();
	}

	function changeError(id) {
		$("#" + id).closest(".form-group").removeClass("has-error");
		$("#" + id).closest(".form-group").find("label.error").hide();
	}

	function validate_admin_login(ele)
	 {
		var hasError = 0;
		var user_id = jQuery("#user_id").val();
		var password = jQuery("#password").val();

		// Validation checks
		if (jQuery.trim(user_id) == '') {
			showError("Please enter user id.", "user_id");
			hasError = 1;
		} else {
			changeError("user_id");
		}

		if (jQuery.trim(password) == '') {
			showError("Please enter password", "password");
			hasError = 1;
		} else {
			changeError("password");
		}

		// If there are validation errors, prevent form submission
		if (hasError == 1) {
			return false;
		} else {
			return true;
		}
		return false; // Prevent default form submission
	}
	</script>
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#show_hide_password a");
    const passwordField = document.querySelector("#password");
    const icon = togglePassword.querySelector("i");

    togglePassword.addEventListener("click", function (e) {
        e.preventDefault();
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("bx-hide");
            icon.classList.add("bx-show");
        } else {
            passwordField.type = "password";
            icon.classList.remove("bx-show");
            icon.classList.add("bx-hide");
        }
    });
});

	</script>
</html>