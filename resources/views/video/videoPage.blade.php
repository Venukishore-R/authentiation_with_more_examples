<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Video</title>

	@include('dashboard.user.partials._headerlink')

</head>
<body style="background-color:;">
	<div>
		@include('dashboard.user.partials._navbar')
		<center>
		<div style="padding: 20px; color: white;">
			<p>{{$video->videoName}}</p>
		</div>
 		<video width="700" height="400" controls>
  			<source src="{{ url('Videos/'.$video->videoName.'.mp4') }}" type="video/mp4">
		</video>
		</center>
		<center>
		<div>
			<div style="color: black;">
				<form method="post">
					@csrf
					<button name="like" type="submit" value="like" formaction="{{ route('user.like',[$video->id]) }}">Like</button>
					{{ $totallikes }}
					<button name="dislike" type="submit" value="dislike" formaction="{{ route('user.dislike',[$video->id]) }}">Dislike</button>
					{{ $totaldislikes }}
				</form>
			</div>
		</div>
		</center>
	</div> 

	@include('dashboard.user.partials._headerscript')

</body>
</html>