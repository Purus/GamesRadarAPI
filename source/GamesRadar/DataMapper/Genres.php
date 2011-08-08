<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Genre;

/**
 * Genres data mapper
 */
class Genres extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@see GamesRadar\Entity\Genre}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$data = array();

		foreach ($xml->genre as $node) {
			$entity = new Genre();
			$entity->id   = (int) $node->id;
			$entity->name = (string) $node->name;
			$data[] = $entity;
		}

		return $data;
	}
}