<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Videos</title>
	 <style>
    	div.scroll {
        background-color: black;
        text-decoration-color: white;
        margin-top: 10%;
        margin-left: 15%;
        width: 980px;
        height: 400px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
      }
    </style>
    @include('dashboard.admin.partials._headerlink')
</head>
<body>
<div class="container-scroller">
@include('dashboard.user.partials._navbar')
<div class="container-fluid page-body-wrapper">
	<div class="col-md-6 grid-margin stretch-card">
		<center>
			<div class="scroll">
				<center>
				@foreach($video as $video)
					
					<p>
						{{ $video->id }}
						<a href="{{ route('user.videoShow',[$video->id]) }}">
						{{ $video->videoName }}
						</a>
						This is the video of Desgin Thinking is helps to compete,conquer and win the world 
					</p>
				<br>
				@endforeach

				</center>
			</div>
		</center>
	</div>
</div>
</div>
@include('dashboard.user.partials._headerscript')
</body>
</html>