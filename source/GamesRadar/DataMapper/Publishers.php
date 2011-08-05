<?php

namespace GamesRadar\DataMapper;

use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Company;

class Publishers extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@see Platform}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->company as $node) {
			$entity = new Company();
			$entity->id   = (int) $node->id;
			$entity->name = (string) $node->name;
			$data[] = $entity;
		}

		return $data;
	}
}