<html>
<head>
	<title>Generation 1 Pokedex</title>
	<!-- jquery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- end jquery -->
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- end bootstrap -->
	<style type="text/css">
		#pokemon {
			vertical-align: top;
			display: inline-block;
			width: 800px;
		}
		#pokedex {
			position: fixed;
			display: inline-block;
			width: 200px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			for(var i=1;i<=718;i++) {
				$('#pokemon').append("<img id="+i+" src='http://pokeapi.co/media/img/"+i+".png'>");		
			}				
			$('img').click(function() {
				var id = $(this).attr('id');
				$.get("http://pokeapi.co/api/v1/pokemon/"+id+"/", function(info) {
					$('#pokedex').html("<h3>"+info.name+"</h3>");
					$('#pokedex').append("<img src='http://pokeapi.co/media/img/"+id+".png'>");	
					$('#pokedex').append("<h4>Types</h4><ul>");
					for(var i=0;i<info.types.length;i++) {
						$('#pokedex').append("<li>"+info.types[i].name+"</li>");
					}
					$('#pokedex').append("</ul><h4>Height</h4><ul><li>"+info.height+"dm</li></ul><h4>Weight</h4><ul><li>"+info.weight+"hkg</li></ul>");
				})					
			})	
		})
	</script>
</head>
<body>
	<div class="container">
		<div id="pokemon">
		</div>
		<div id="pokedex">			
		</div>
	</div>
</body>
</html>