<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Article;
use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Game\Article as Game;

/**
 * Articles data mapper
 */
class Articles extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return array {@link GamesRadar\Entity\Article}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->article as $node) {
			$entity = new Article();

			$entity->id = (int) $node->id;
			$entity->type = (string) $node->type;
			$entity->publishedDate = strtotime($node->published_date);
			$entity->headline = (string) $node->headline;
			$entity->strapline = (string) $node->strapline;
			$entity->bodySnippet = (string) $node->body_snippet;
			$entity->url = (string) $node->url;
			$enity->images['thumbnail'] = (string) $node->images->thumbnail;
			$enity->images['large']     = (string) $node->images->large;

			$entity->game = new Game;
			$entity->game->id   = (int) $node->game->id;
			$entity->game->name = (string) $node->game->name;

			$entity->game->platform = new Platform;
			$entity->game->platform->id   = (int) $node->game->platform->id;
			$entity->game->platform->name = (string) $node->game->platform->name;

			$data[] = $entity;
		}

		return $data;
	}
}