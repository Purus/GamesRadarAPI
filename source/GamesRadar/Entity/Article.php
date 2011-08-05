<?php

namespace GamesRadar\Entity;

class Article
{
	public $id;

	public $type;

	public $game;

	public $publishedDate;

	public $headline;

	public $strapline;

	public $bodySnippet;

	public $url;

	public $images = array(
		'thumbnail' => null,
		'large'     => null,
	);
}