<?php

namespace GamesRadar\Entity\Game;

use GamesRadar\Entity\Game\Game;

class Details extends Game
{
	public $name = array();

	public $description;

	public $alternativeNames;

	public $platform;

	public $genre = array();

	public $franchise = array();

	public $designer;

	public $developers = array();

	public $publishers = array(
		'us' => array(),
		'uk' => array(),
	);

	public $censorship = array();

	public $expectedReleaseDate = array();

	public $releateDate = array();

	public $updatedDate;

	public $upc = array();

	public $officialSite = array();

	public $score = array();

	public $url;

	public $images = array(
		'thumbnail' => null,
		'boxart'    => null,
	);

	public $technicalFeatures;

	public $minimalSystemSpecs;

	public $recommendedSystemSpecs;

	public $multiplayerModes = array();

	public $links = array(
		'cheats'      => null,
		'guideFaqs'   => null,
		'news'        => null,
		'previews'    => null,
		'features'    => null,
		'review'      => null,
		'screenshots' => null,
		'vieos'       => null,
		'downloads'   => null,
		'rss'         => null,
	);
}