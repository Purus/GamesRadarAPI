#!/usr/bin/env php
<?php

$pharname = __DIR__ . '/../target/GamesRadarAPI.phar';
$stubname = __DIR__ . '/../source/phar_stub.php';

if (file_exists($pharname)) {
	Phar::unlinkArchive($pharname);
}

$stub = file_get_contents($stubname);

$phar = new Phar($pharname);
$phar->setStub($stub);
$phar->buildFromDirectory('../source/GamesRadar');

echo "Done\n";