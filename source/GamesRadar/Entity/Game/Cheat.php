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
class Cheat extends Game
{
	/**
	 * @var string
	 */
	public $id;

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

	/**
	 * @var array
	 */
	public $images = array(
		'thumbnail' => null,
	);
}