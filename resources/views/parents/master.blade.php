<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>mon projet</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/css/bootstrap.css') }}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        
        @yield('contenu')

      </div>
    </div>
  </div>
</body>
</html>