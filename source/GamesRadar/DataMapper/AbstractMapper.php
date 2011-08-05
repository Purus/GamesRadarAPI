<?php

namespace GamesRadar\DataMapper;

use SimpleXMLElement;

abstract class AbstractMapper
{
	abstract public function fromXml(SimpleXMLElement $xml);
}