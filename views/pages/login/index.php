<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
	html,
	body {
		height: 100%;
	}

	body.my-login-page {
		background-color: #f7f9fb;
		font-size: 14px;
	}

	.my-login-page .brand {
		width: 200px;
		height: 200px;
		overflow: hidden;
		border-radius: 30%;
		margin: 40px auto;
		box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
		position: relative;
		z-index: 1;
	}

	.my-login-page .brand img {
		width: 100%;
	}

	.my-login-page .card-wrapper {
		width: 400px;
	}

	.my-login-page .card {
		border-color: transparent;
		box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
	}

	.my-login-page .card.fat {
		padding: 10px;
	}

	.my-login-page .card .card-title {
		margin-bottom: 30px;
	}

	.my-login-page .form-control {
		border-width: 2.3px;
	}

	.my-login-page .form-group label {
		width: 100%;
	}

	.my-login-page .btn.btn-block {
		padding: 12px 10px;
	}

	.my-login-page .footer {
		margin: 40px 0;
		color: #888;
		text-align: center;
	}

	@media screen and (max-width: 425px) {
		.my-login-page .card-wrapper {
			width: 90%;
			margin: 0 auto;
		}
	}

	@media screen and (max-width: 320px) {
		.my-login-page .card.fat {
			padding: 0;
		}

		.my-login-page .card.fat .card-body {
			padding: 15px;
		}
	}
</style>

<body>
	<?php include_once("../../../function.php"); ?>
	<?php
	if (isset($_GET["error"])) {
		$error = $_GET["error"];
		if ($error == 1)
			showError("Email dan password tidak sesuai");
		else if ($error == 2)
			showError("Error Database. Silahkan Hubungi Administrator");
		else if ($error == 3)
			showError("Koneksi ke Database gagal.Autentikasi Gagal");
		else if ($error == 4)
			showError("Anda Tidak Boleh Mengakses Halaman Sebelumnya. Silahkan Login Terlebih Dahulu");
		else
			showError("Unknown Error");
	}
	?>

	<body class="my-login-page">
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="img/poto.jpg" alt="logo">
						</div>
						<div class="card fat">
							<div class="card-body">
								<h4 class="card-title">Login</h4>
								<form action="backend_login.php" method="post" class="my-login-validation">
									<div class="form-group">
										<label for="email">Username</label>
										<input id="email" type="text" class="form-control" name="username" id="email" required autofocus>
										<div class="invalid-feedback">
											Email is invalid
										</div>
									</div>

									<div class="form-group">
										<label for="password">Password</label>
										<input name="your_pass" id="your_pass" type="password" class="form-control" required data-eye>
										<div class="invalid-feedback">
											Password is required
										</div>
									</div>

									<div class="form-group m-0">
										<button type="submit" name="signin" id="signin" class="btn btn-primary btn-block">
											Login
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="backend_login.php" method="post" class="login100-form validate-form">

					<img src="../../../logo DPMPTSP baru-Name clover.png">
					<div class="wrap-input100 validate-input" data-validate="Insert Your Email">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="your_pass" id="your_pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="lupapass.php">
							Forgot password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="signin" id="signin" class="login100-form-btn" value="Log in" />
					</div>


				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div> -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
			$(function() {

				// author badge :)
				var author = '<div style="position: fixed;bottom: 0;right: 20px;background-color: #fff;box-shadow: 0 4px 8px rgba(0,0,0,.05);border-radius: 3px 3px 0 0;font-size: 12px;padding: 5px 10px;">By <a href="https://twitter.com/mhdnauvalazhar">@mhdnauvalazhar</a> &nbsp;&bull;&nbsp; <a href="https://www.buymeacoffee.com/mhdnauvalazhar">Buy me a Coffee</a></div>';
				$("body").append(author);

				$("input[type='password'][data-eye]").each(function(i) {
					var $this = $(this),
						id = 'eye-password-' + i,
						el = $('#' + id);

					$this.wrap($("<div/>", {
						style: 'position:relative',
						id: id
					}));

					$this.css({
						paddingRight: 60
					});
					$this.after($("<div/>", {
						html: 'Show',
						class: 'btn btn-primary btn-sm',
						id: 'passeye-toggle-' + i,
					}).css({
						position: 'absolute',
						right: 10,
						top: ($this.outerHeight() / 2) - 12,
						padding: '2px 7px',
						fontSize: 12,
						cursor: 'pointer',
					}));

					$this.after($("<input/>", {
						type: 'hidden',
						id: 'passeye-' + i
					}));

					var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

					if (invalid_feedback.length) {
						$this.after(invalid_feedback.clone());
					}

					$this.on("keyup paste", function() {
						$("#passeye-" + i).val($(this).val());
					});
					$("#passeye-toggle-" + i).on("click", function() {
						if ($this.hasClass("show")) {
							$this.attr('type', 'password');
							$this.removeClass("show");
							$(this).removeClass("btn-outline-primary");
						} else {
							$this.attr('type', 'text');
							$this.val($("#passeye-" + i).val());
							$this.addClass("show");
							$(this).addClass("btn-outline-primary");
						}
					});
				});

				$(".my-login-validation").submit(function() {
					var form = $(this);
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.addClass('was-validated');
				});
			});
		</script>
	</body>

</html>