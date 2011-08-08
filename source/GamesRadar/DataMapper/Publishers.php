<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Company;

/**
 * Publisher data mapper
 */
class Publishers extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@link GamesRadar\Entity\Platform}
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