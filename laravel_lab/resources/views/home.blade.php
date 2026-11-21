<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My First Laravel Page</title>
</head>
<body>
	<a href="{{ url('/about') }}">About Me</a>
	<h1>Welcome to my laravel webpage</h1>
	<p>Student: Reza Hussaini</p>
	<p>Course: {{ $course }}</p>
	<p>This is my first blade view</p>

</body>
</html>