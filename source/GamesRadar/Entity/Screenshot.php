<?php

namespace GamesRadar\Entity;

use GamesRadar\Entity\GameMedia;

class Screenshot
{
	/**
	 * @var GameMedia
	 */
	public $game;

	public $publishedDate;

	public $url;

	public $images = array(
		'thumbnail' => null,
	);
}