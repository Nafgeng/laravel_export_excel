<!DOCTYPE html>
<html lang="en">
<head>
  <title>How To Export Excel File In Laravel 9 - Techsolutionstuff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h3>How To Export Excel File In Laravel 9 - Techsolutionstuff</h3>
	<form action="#" method="POST" name="importform"
	  enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<a class="btn btn-info" href="{{ route('export.excel') }}">Export Excel File</a>
		</div>
	</form>
</div>
</body>
</html>
