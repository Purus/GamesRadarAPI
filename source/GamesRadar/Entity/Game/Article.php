<?php
/**
 * @package GamesRadar\Entity
 * @subpackage Game
 */

namespace GamesRadar\Entity\Game;
use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Game\Game;

/**
 *
 */
class Article extends Game
{
	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var Platform
	 */
	public $platform;
}