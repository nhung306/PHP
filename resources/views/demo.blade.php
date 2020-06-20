<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="demo/1" method="POST">
	@csrf
	<input type="submit" value="submit">
</form>
	<a href="demo/1">click</a>
	@if(Session::has('cart'))
	    <div class="alert alert-success">
	        444444
	        {{ dd(Session('cart')) }}
	    </div>
	@else
	    <div class="alert alert-success">
	         12313231
	          {{ dd(Session('cart')) }}
	    </div>
	@endif
</body>
</html>