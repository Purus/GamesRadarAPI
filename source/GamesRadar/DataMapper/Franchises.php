<?php

namespace GamesRadar\DataMapper;

use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Franchise;

class Franchises extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@see Platform}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->franchise as $node) {
			$entity = new Franchise();
			$entity->id   = (int) $node->id;
			$entity->name = (string) $node->name;
			$data[] = $entity;
		}

		return $data;
	}
}