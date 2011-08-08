<?php

require __DIR__ . '/../target/GamesRadarAPI.phar';

use GamesRadar\Params\Platform;

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$games = $client->games(array(
	'page' => 1,
));

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>GamesRadarAPI</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://github.com/malsup/form/raw/master/jquery.form.js"></script>

	<style type="text/css">
table {
	border-spacing: 0;
	border: 2px solid black;
}
table td, table th {
	padding: 5px;
	border-left: 1px solid black;
}
table th {
	border-bottom: 2px solid black;
}
	</style>
</head>
<body>


<h1>List of games</h1>
<div id="block1">
	<form action="games.php" method="get">
		<input type="hidden" name="page" value="2" />
		<input type="submit" value="Next" />
	</form>
	<div>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
  </tr>
  <?php foreach ($games as $game): ?>
  <tr>
    <td><?= $game->id ?></td>
    <td><?= $game->name['us'] ?></td>
  </tr>
  <?php endforeach ?>
</table>

	</div>
</div>


<h1>Search for game</h1>
<div id="block2">
	<form action="search.php" method="get">
		<select name="platform">
			<option value="<?= Platform::ALL ?>">All</option>
			<option value="<?= Platform::PS2 ?>">PS2</option>
			<option value="<?= Platform::PS3 ?>">PS3</option>
			<option value="<?= Platform::XBOX ?>">XBox</option>
			<option value="<?= Platform::XBOX_360 ?>">XBox 360</option>
			<option value="<?= Platform::PC ?>">PC</option>
		</select>
		<input type="text" name="prefix" value="" />
		<input type="submit" value="Search" />
	</form>
	<div></div>
</div>

<h1>Game info</h1>
<div id="block3">
	<form action="game.php" method="get">
		<input type="text" name="id" value="" />
		<input type="submit" value="Show" />
	</form>
	<div></div>
</div>


<script type="text/javascript">
(function($){
	var cnt = 2;

	$('#block1 form').ajaxForm({
		target: '#block1 div',
		success: function(){
			$('#block1 form input[type=hidden]').val(++ cnt);
		}
	});

	$('#block2 form').ajaxForm({
		target: '#block2 div'
	});

	$('#block3 form').ajaxForm({
		target: '#block3 div'
	});
})(jQuery);

</script>

</body>
</html>