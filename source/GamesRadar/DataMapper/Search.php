<?php

namespace GamesRadar\DataMapper;

use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Game\Search as Game;

class Search extends AbstractMapper
{
	/**
	 * (non-PHPdoc)
	 * @see GamesRadar\DataMapper.AbstractMapper::fromXml()
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