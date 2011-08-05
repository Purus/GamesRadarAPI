<?php

namespace GamesRadar\DataMapper;

use SimpleXMLElement;
use GamesRadar\DataMapper\AbstractMapper;
use GamesRadar\Entity\Platform;

class Platforms extends AbstractMapper
{
	/**
	 * @param SimpleXMLElelemt
	 * @return array {@see Platform}
	 */
	public function fromXml(SimpleXMLElement $xml)
	{
		$platforms = array();

		foreach ($xml->platform as $node) {
			$platform = new Platform();
			$platform->id   = (int) $node->id;
			$platform->name = (string) $node->name;
			$platforms[] = $platform;
		}

		return $platforms;
	}
}