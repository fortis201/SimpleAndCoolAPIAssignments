<html>
<head>
	<title>Ajax Notes</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- css styles -->
	<style type="text/css">
		.container {
			width: 300px;
			margin: 3rem auto 0 auto;
		}
			.container * {
				margin: 1rem 0;
			}
			.separator {
				width: 300px;
				height: 2rem;
				border-bottom: 1px solid silver;
			}
	</style>
	<!-- end of css styles -->

	<script type="text/javascript">
		$(document).ready(function() {
			$.get('/notes/show', function(res) {
				$('#display').html(res);
			});
			$(document).on('focusout', '#desc', function() {
				$.post(	$(this).parent().attr('action'), $(this).parent().serialize(),function(res) {
					$('#display').html(res);
				})
				return false;
			});
			$(document).on('submit', '#create', function() {
				$.post( $(this).attr('action'), $(this).serialize(), function(post) {
					console.log(this);
					$('#display').html(post);
				})
				return false;
			});
			$(document).on('click', '#destroy', function() {
				$.post( $(this).parent().attr('action'), $(this).parent().serialize(), function(del) {					$('#display').html(del);
				})
				return false;
			});
		})
	</script>
</head>
<body>
	<div class="container">
		<!-- <div class="display"></div> -->
		<h3>Notes</h3>
		<div id='display'></div>
		<form id="create" action='/notes/create' method="post">
			<input type="text" name="title" placeholder="Add a note!">
			<input type="submit" value="Add Note">
		</form>
	</div>
</body>
</html>