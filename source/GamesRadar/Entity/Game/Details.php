<?php
/**
 * @package GamesRadar\Entity
 * @subpackage Game
 */

namespace GamesRadar\Entity\Game;
use GamesRadar\Entity\Game\Game;

/**
 *
 */
class Details extends Game
{
	/**
	 * @var array
	 */
	public $name = array(
		'uk' => '',
		'us' => '',
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
	 * @var string
	 */
	public $genre;

	/**
	 * @var string
	 */
	public $franchise;

	/**
	 * @var string
	 */
	public $designer;

	/**
	 * @var array[int]string
	 */
	public $developers = array();

	/**
	 * @var array
	 */
	public $publishers = array(
		'us' => array(),
		'uk' => array(),
	);

	/**
	 * @var array
	 */
	public $censorship = array();

	/**
	 * @var array
	 */
	public $expectedReleaseDate = array(
		'uk' => '',
		'us' => '',
	);

	/**
	 * @var array
	 */
	public $releaseDate = array(
		'uk' => null,
		'us' => null,
	);

	/**
	 * @var int
	 */
	public $updatedDate;

	/**
	 * @var array
	 */
	public $upc = array();

	/**
	 * @var string
	 */
	public $officialSite = array();

	/**
	 * @var string
	 */
	public $score;

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
			'us' => '',
			'uk' => '',
		),
	);

	/**
	 * @var string
	 */
	public $technicalFeatures;

	/**
	 * @var string
	 */
	public $minimalSystemSpecs;

	/**
	 * @var string
	 */
	public $recommendedSystemSpecs;

	/**
	 * @var array
	 */
	public $multiplayerModes = array(
		'online'  => array(),
		'offline' => array(),
	);

	/**
	 * @var array
	 */
	public $links = array();
}