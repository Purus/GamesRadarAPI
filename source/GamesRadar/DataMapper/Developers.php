<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Company;

/**
 * Developers data mapper
 */
class Developers extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@link GamesRadar\Entity\Company}
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