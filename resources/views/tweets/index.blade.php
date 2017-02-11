<html>
<head>
	<title>Tweets</title>
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
  		@if (count($errors) > 0)
	  		<div class="alert alert-danger">
	  			<ul>
	  				@foreach ($errors->all() as $error)
	  					<li>{{ $error }}</li>
	  				@endforeach
	  			</ul>
	  		</div>
	  	@endif

	<div class="container">
		@if (session('successStatus'))
			<div class="alert alert-success" role="alert">
				{{  session('successStatus') }}
			</div>
		@endif

    <h1>Tweet Something</h1>
	      <form action="/" method="post">
	      	{{ csrf_field() }}
	      	<div class="form-group">
	        <input type="text" name="tweettext" id="tweettext">
	   		</div>
	   		<button type="submit" class="btn btn-primary">Tweet</button>
	      </form>
 	</div>


	<!-- Display all tweets -->
	<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th colspan="3">Tweet</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tweets as $tweet)
			<tr>
				<td>{{$tweet->id}}</td>
				<td>{{$tweet->tweet}}</td>
				<td>
					<a href="/{{ $tweet->id }}/delete" class="btn">X</a>
				</td>
				<td>
					<a href="/tweets/{{$tweet->id}}" class="btn">View</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

</body>
</html>