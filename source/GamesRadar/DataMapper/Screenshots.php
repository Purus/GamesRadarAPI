<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Video;
use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Game\Media as Game;

/**
 * Screenshots data mapper
 */
class Screenshots extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return array {@link GamesRadar\Entity\Screenshot}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->screenshot as $node) {
			$entity = new Video();

			$entity->id = (int) $node->id;
			$entity->publishedDate = strtotime($node->published_date);
			$entity->url = (string) $node->url;
			$enity->images['thumbnail'] = (string) $node->images->thumbnail;

			$entity->game = new Game;
			$entity->game->id          = (int) $node->game->id;
			$entity->game->name        = (string) $node->game->name;
			$entity->game->description = (string) $node->game->description;

			$entity->game->platform = new Platform;
			$entity->game->platform->id   = (int) $node->game->platform->id;
			$entity->game->platform->name = (string) $node->game->platform->name;

			$data[] = $entity;
		}

		return $data;
	}
}