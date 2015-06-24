<html>
<head>
	<title>Notes: iTunes API</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<style type="text/css">
		.container{
			width: 700px;
			margin: 5rem auto 0 auto;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('form').submit(function() {
				$('#loading').html("<img src='assets/loading.gif' style='width: 200px; height: 200px;'>");
				$.post($(this).attr('action'), $(this).serialize(), function(res) {
					var loading = "<img id='loadingimg'src='/assets/loading.gif'>";
					$('#vid').remove();
					$('#loading').html(loading);
					if(res.results.length !== 0) {
						$('#loadingimg').remove();
						var html_string = "<video id='vid' controls src='"+res.results[0].previewUrl+"'></video>";							
					}
					else {
						html_string = "Not Found";
					}
					$('#results').html(html_string);		
				},'json');				
				return false;
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<h1>Search by Artist Name:</h1>
		<form action="/main/get_movie" method="post">
			<label for="user_input">Enter Artists Name: </label>
			<input id="user_input" name="user_input" type="search">
			<input type="submit" value="Search!">
		</form>
		<div id="loading"></div>
		<div id="results"></div>
	</div>

</body>
</html>