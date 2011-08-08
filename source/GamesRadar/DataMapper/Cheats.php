<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Cheat;
use GamesRadar\Entity\Platform;
use GamesRadar\Entity\Game\Cheat as Game;

/**
 * Cheats data mapper
 */
class Cheats extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return array {@link GamesRadar\Entity\Cheat}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->cheat as $node) {
			$entity = new Cheat();

			$entity->type          = (string) $node->type;
			$entity->publishedDate = strtotime($node->published_date);
			$entity->url           = (string) $node->url;

			$entity->game = new Game;
			$entity->game->id          = (int) $node->game->id;
			$entity->game->name        = (string) $node->game->name;
			$entity->game->description = (string) $node->game->description;
			$entity->game->images['thumbnail'] = (string) $node->game->images->thumbnail;

			$entity->game->platform = new Platform;
			$entity->game->platform->id   = (int) $node->game->platform->id;
			$entity->game->platform->name = (string) $node->game->platform->name;

			$data[] = $entity;
		}

		return $data;
	}
}