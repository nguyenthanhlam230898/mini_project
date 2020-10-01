<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mobile Shop - Administrator</title>

<link href="./public/css/bootstrap.min.css" rel="stylesheet">
<link href="./public/css/datepicker3.css" rel="stylesheet">
<link href="./public/css/bootstrap-table.css" rel="stylesheet">
<link href="./public/css/styles.css" rel="stylesheet">

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Mobile Shop - Administrator</div>
				<div class="panel-body">
					<!-- <div class="alert alert-danger">Tài khoản không hợp lệ !</div> -->
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input require class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input require class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button name ="sbm" type="submit" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>