#!/usr/bin/env php
<?php

if (3 > count($argv)) {
	echo "Right syntax: search.php <platform> <gamename prefix>\n";
	exit;
}

include __DIR__ . '/../target/GamesRadarAPI.phar';

$platform = $argv[1];
$prefix = $argv[2];

$apiKey = 'ed4ea4ffea0e0af86ea1490a45bc49a8';

$requester = new GamesRadar\Requester();
$client = new GamesRadar\Client($requester, $apiKey);

$data = $client->search($platform, $prefix);

foreach ($data as $game) {
	/* @var $game GamesRadar\Entity\Game\Search */
	echo $game->id . "\t" . $game->name . "\n";
}