<html>
<head>
	<title>Notes Partials</title>
</head>
<body>
	<?php 
	foreach ($all_notes as $note) {
	?>	
	<div class='separator'></div>
		<h2><?= $note['title'] ?></h2>
		<form id="destroy" action='/notes/destroy' method="post">
		<input type='hidden' name='id' value="<?= $note['id'] ?>" >
		<a id="destroy" href="/notes/destroy/">Delete</a>
		</form>
		<form class="edit" action='/notes/update' method="post">			
			<textarea id="desc" name="description" placeholder="Enter a note description" ><?= $note['description'] ?></textarea>
			<input id="id" type='hidden' name='id' value=<?= $note['id'] ?> >
			<!-- <input type="submit" value="edit description"> -->
		</form>		
	<?php
	}
	?>
</body>
</html>