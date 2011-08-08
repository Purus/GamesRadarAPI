<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Game\Games as Game;

/**
 * Games data mapper
 */
class Games extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return array {@link GamesRadar\Entity\Game\Games}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->game as $node) {
			$entity = new Game;

			$entity->id = (int) $node->id;
			$entity->description = (string) $node->description;
			$entity->alternativeNames = (string) $node->alternative_names;
			$entity->updatedDate = strtotime($node->updated_date);
			$entity->url = (string) $node->url;

			$entity->name['us'] = (string) $node->name->us;
			$entity->name['uk'] = (string) $node->name->uk;

			$entity->expectedReleaseDate['us'] = (string) $node->expected_release_date->us;
			$entity->expectedReleaseDate['uk'] = (string) $node->expected_release_date->uk;

			$entity->releaseDate['us'] = strtotime($node->release_date->us);
			$entity->releaseDate['uk'] = strtotime($node->release_date->uk);

			$entity->score['id'] = (int) $node->score->id;
			$entity->score['name'] = (string) $node->score->name;

			$entity->images['thumbnail'] = (string) $node->images->thumbnail;
			$entity->images['boxart']['us'] = (string) $node->images->box_art->us;
			$entity->images['boxart']['uk'] = (string) $node->images->box_art->uk;

			$entity->platform = (string) $node->platform->name;

			$data[] = $entity;
		}

		return $data;
	}
}