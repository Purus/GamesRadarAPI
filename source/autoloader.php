<?php

namespace GamesRadar;

$classmap = array(
	'GamesRadar\Requester'         => 'GamesRadar/Requester.php',
	'GamesRadar\Service'           => 'GamesRadar/Service.php',
	'GamesRadar\ExceptionFactory'  => 'GamesRadar/ExceptionFactory.php',
	'GamesRadar\DataMapperFactory' => 'GamesRadar/DataMapperFactory.php',

	'GamesRadar\Exception\Base'          => 'GamesRadar/Exception/Base.php',
	'GamesRadar\Exception\Communication' => 'GamesRadar/Exception/Communication.php',
	'GamesRadar\Exception\Unknown'       => 'GamesRadar/Exception/Unknown.php',

	'GamesRadar\Params\Article'  => 'GamesRadar/Params/Article.php',
	'GamesRadar\Params\Genre'    => 'GamesRadar/Params/Genre.php',
	'GamesRadar\Params\Platform' => 'GamesRadar/Params/Platform.php',
	'GamesRadar\Params\Sort'     => 'GamesRadar/Params/Sort.php',

	'GamesRadar\DataMapper\AbstractMapper' => 'GamesRadar/DataMapper/AbstractMapper.php',
	'GamesRadar\DataMapper\Platforms'      => 'GamesRadar/DataMapper/Platforms.php',
	'GamesRadar\DataMapper\Publishers'     => 'GamesRadar/DataMapper/Publishers.php',
	'GamesRadar\DataMapper\Developers'     => 'GamesRadar/DataMapper/Developers.php',
	'GamesRadar\DataMapper\Franchises'     => 'GamesRadar/DataMapper/Franchises.php',
	'GamesRadar\DataMapper\Genres'         => 'GamesRadar/DataMapper/Genres.php',
	'GamesRadar\DataMapper\Articles'       => 'GamesRadar/DataMapper/Articles.php',
	'GamesRadar\DataMapper\Videos'         => 'GamesRadar/DataMapper/Videos.php',
	'GamesRadar\DataMapper\Screenshots'    => 'GamesRadar/DataMapper/Screenshots.php',
	'GamesRadar\DataMapper\Cheats'         => 'GamesRadar/DataMapper/Cheats.php',
	'GamesRadar\DataMapper\Games'          => 'GamesRadar/DataMapper/Games.php',

	'GamesRadar\Entity\Article'    => 'GamesRadar/Entity/Article.php',
	'GamesRadar\Entity\Platform'   => 'GamesRadar/Entity/Platform.php',
	'GamesRadar\Entity\Company'    => 'GamesRadar/Entity/Company.php',
	'GamesRadar\Entity\Franchise'  => 'GamesRadar/Entity/Franchise.php',
	'GamesRadar\Entity\Genre'      => 'GamesRadar/Entity/Genre.php',
	'GamesRadar\Entity\Video'      => 'GamesRadar/Entity/Video.php',
	'GamesRadar\Entity\Screenshot' => 'GamesRadar/Entity/Screenshot.php',
	'GamesRadar\Entity\Cheat'      => 'GamesRadar/Entity/Cheat.php',

	'GamesRadar\Entity\Game\Article' => 'GamesRadar/Entity/Game/Article.php',
	'GamesRadar\Entity\Game\Game'    => 'GamesRadar/Entity/Game/Game.php',
	'GamesRadar\Entity\Game\Games'    => 'GamesRadar/Entity/Game/Games.php',
	'GamesRadar\Entity\Game\Media'    => 'GamesRadar/Entity/Game/Media.php',
	'GamesRadar\Entity\Game\Cheat'    => 'GamesRadar/Entity/Game/Cheat.php',
);

spl_autoload_register(function($classname) use ($classmap)
{
	if (isset($classmap[$classname])) {
		include __DIR__ . '/' . $classmap[$classname];
	}
});