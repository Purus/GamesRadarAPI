<?php
/**
* @package GamesRadar\Entity
*/

namespace GamesRadar\Entity;
use GamesRadar\Entity\GameMedia;

/**
 *
 */
class Video
{
	/**
	 * @var string
	 */
	public $id;

	/**
	 * @var GameVideo
	 */
	public $game;

	public $publishedDate;

	public $headline;

	public $url;

	public $images = array(
		'thumbnail' => null,
	);
}