<?php

namespace GamesRadar\Entity;

use GamesRadar\Entity\Game\Cheat as GameCheat;

class Cheat
{
	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var GameCheat
	 */
	public $game;

	/**
	 * @var int
	 */
	public $publishedDate;

	/**
	 * @var string
	 */
	public $url;
}