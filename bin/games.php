#!/usr/bin/env php
<?php

if (2 > count($argv)) {
	echo "Right syntax: games.php <start>\n";
	exit;
}

include __DIR__ . '/../target/GamesRadarAPI.phar';

$page = (int) $argv[1];

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$data = $client->games(array(
	'page' => $page,
));

foreach ($data as $game) {
	/* @var $game GamesRadar\Entity\Game\Search */
	echo $game->id . "\t" . $game->name['us'] . "\n";
}