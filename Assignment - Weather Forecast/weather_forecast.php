<html>
<head>
	<title>Weather API</title>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {		
			var city = $('#city').val();
			// console.log(city);		
			$('form').submit(function() {
				var city = $('#city').val();
				// console.log(city);
				$.get("http://api.openweathermap.org/data/2.5/weather?q="+city+"&units=imperial", function(data) {
					console.log(data);
					if(data.cod != '404') {
						$('#result').html("<p>Average Daily Temperature: "+data.main.temp+" &degF</p>")
						.append("<p>Daliy Low: "+data.main.temp_min+" &degF</p>")
						.append("<p>Daily High: "+data.main.temp_max+" &degF</p>")
						.append("<p>Humidity: "+data.main.humidity+"%</p>")
						.append("<p>Air Pressure: "+data.main.pressure+"Pa</p>")
						.append("<p>Description: "+data.weather['0']['description']+"</p>");
					}
					else {
						$('#result').append("<p>Please enter a valid city name.</p>")
					}
				}, "json");				
				return false;
			})
		})
	</script>
	<style type="text/css">
		.container {
			width: 300px;
			margin: 0 auto;
		}
		input {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Weather Info</h2>
		<form>
			<input id="city" type='text' name='city'>
			<input type='submit' class='btn btn-success' value='Check Weather'>
		</form>
		<div id="result"></div>
	</div>
</body>
</html>