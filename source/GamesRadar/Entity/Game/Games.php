<?php

namespace GamesRadar\Entity\Game;

use GamesRadar\Entity\Game\Game;

class Games extends Game
{
	public $name = array(
		'us' => null,
		'uk' => null,
	);

	public $description;

	public $alternativeNames;

	public $platform = array();

	public $expectedReleaseDate = array(
		'us' => null,
		'uk' => null,
	);

	public $releateDate = array(
		'us' => null,
		'uk' => null,
	);

	public $updatedDate;

	public $score = array(
		'id' => null,
		'name' => null,
	);

	public $url;

	public $images = array(
		'thumbnail' => null,
		'boxart'    => array(
			'us' => null,
			'uk' => null,
		),
	);
}