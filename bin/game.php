#!/usr/bin/env php
<?php

if (2 > count($argv)) {
	echo "Right syntax: game.php <id>\n";
	exit;
}

include __DIR__ . '/../target/GamesRadarAPI.phar';
// include __DIR__ . '/../source/autoloader.php';

$id = $argv[1];

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$game = $client->game($id);

echo $game->id . "\n";

