<?php
/**
 * @package GamesRadar\DataMapper
 */

namespace GamesRadar\DataMapper;
use SimpleXMLElement;

/**
 * Abstract data mapper
 */
abstract class AbstractMapper
{
	/**
	 * Return entity or array of entities
	 *
	 * @param SimpleXMLElement $xml
	 * @return mixed
	 */
	abstract public function fromXml(SimpleXMLElement $xml);
}