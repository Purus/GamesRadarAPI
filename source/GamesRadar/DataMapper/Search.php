<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Game\Search as Game;

/**
 * Search data mapper
 */
class Search extends AbstractMapper
{
	/**
	 * @param SimpleXMLElement $xml
	 * @return array {@link GamesRadar\Entity\Game\Search}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->game as $node) {
			$entity = new Game();
			$entity->id = (int) $node->id;
			$entity->name = (string) $node->name;

			$data[] = $entity;
		}

		return $data;
	}
}