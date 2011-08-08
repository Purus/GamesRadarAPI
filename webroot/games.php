<?php

include __DIR__ . '/../target/GamesRadarAPI.phar';

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$games = $client->games(array(
	'page' => $page,
));

header('Content-Type: text/html; charset=UTF-8');
?>


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
