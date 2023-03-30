<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Listen tag</title>
</head>
<body>
	<div id="app"></div>
	Hello
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>