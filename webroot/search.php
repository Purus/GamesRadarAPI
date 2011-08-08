<?php

include __DIR__ . '/../target/GamesRadarAPI.phar';

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$platform = filter_input(INPUT_GET, 'platform', FILTER_SANITIZE_STRING);
$prefix = filter_input(INPUT_GET, 'prefix', FILTER_SANITIZE_STRING);

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$data = $client->search($platform, $prefix);

header('Content-Type: text/html; charset=UTF-8');

?>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
  </tr>
  <?php foreach ($data as $game): ?>
    <?php /* @var $game GamesRadar/Entity/Game/Search */ ?>
  <tr>
    <td><?= $game->id ?></td>
    <td><?= $game->name ?></td>
  </tr>
  <?php endforeach ?>
</table>
