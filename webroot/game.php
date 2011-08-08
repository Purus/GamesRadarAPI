<?php

include __DIR__ . '/../target/GamesRadarAPI.phar';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$game = $client->game($id);

header('Content-Type: text/html; charset=UTF-8');
?>

<xml><?php var_dump($game) ?></xml>
