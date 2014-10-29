<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	    <h1>Hi {{ $username  }}</h1>
		<h2>@yield('heading')</h2>

		<div>
			@yield( 'content' )
		</div>
	</body>
</html>
