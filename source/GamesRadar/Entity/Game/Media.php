<?php

namespace GamesRadar\Entity\Game;

use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Game\Game;

class Media extends Game
{
	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var Platform
	 */
	public $platform;
}