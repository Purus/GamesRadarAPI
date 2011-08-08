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
class Games extends Game
{
	/**
	 * @var array
	 */
	public $name = array(
		'us' => null,
		'uk' => null,
	);

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var string
	 */
	public $alternativeNames;

	/**
	 * @var string
	 */
	public $platform;

	/**
	 * @var array
	 */
	public $expectedReleaseDate = array(
		'us' => null,
		'uk' => null,
	);

	/**
	 * @var array
	 */
	public $releateDate = array(
		'us' => null,
		'uk' => null,
	);

	/**
	 * @var int
	 */
	public $updatedDate;

	/**
	 * @var array
	 */
	public $score = array(
		'id' => null,
		'name' => null,
	);

	/**
	 * @var string
	 */
	public $url;

	/**
	 * @var array
	 */
	public $images = array(
		'thumbnail' => null,
		'boxart'    => array(
			'us' => null,
			'uk' => null,
		),
	);
}