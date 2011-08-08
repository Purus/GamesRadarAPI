<?php

namespace GamesRadar;

use Phar;

Phar::mapPhar('GamesRadar');

$classmap = array(
	'GamesRadar\Requester'         => 'phar://GamesRadar/Requester.php',
	'GamesRadar\Client'            => 'phar://GamesRadar/Client.php',
	'GamesRadar\ExceptionFactory'  => 'phar://GamesRadar/ExceptionFactory.php',
	'GamesRadar\DataMapperFactory' => 'phar://GamesRadar/DataMapperFactory.php',

	'GamesRadar\Exception\Base'          => 'phar://GamesRadar/Exception/Base.php',
	'GamesRadar\Exception\Communication' => 'phar://GamesRadar/Exception/Communication.php',
	'GamesRadar\Exception\Unknown'       => 'phar://GamesRadar/Exception/Unknown.php',

	'GamesRadar\Params\Article'  => 'phar://GamesRadar/Params/Article.php',
	'GamesRadar\Params\Genre'    => 'phar://GamesRadar/Params/Genre.php',
	'GamesRadar\Params\Platform' => 'phar://GamesRadar/Params/Platform.php',
	'GamesRadar\Params\Sort'     => 'phar://GamesRadar/Params/Sort.php',

	'GamesRadar\DataMapper\AbstractMapper' => 'phar://GamesRadar/DataMapper/AbstractMapper.php',
	'GamesRadar\DataMapper\Platforms'      => 'phar://GamesRadar/DataMapper/Platforms.php',
	'GamesRadar\DataMapper\Publishers'     => 'phar://GamesRadar/DataMapper/Publishers.php',
	'GamesRadar\DataMapper\Developers'     => 'phar://GamesRadar/DataMapper/Developers.php',
	'GamesRadar\DataMapper\Franchises'     => 'phar://GamesRadar/DataMapper/Franchises.php',
	'GamesRadar\DataMapper\Genres'         => 'phar://GamesRadar/DataMapper/Genres.php',
	'GamesRadar\DataMapper\Articles'       => 'phar://GamesRadar/DataMapper/Articles.php',
	'GamesRadar\DataMapper\Videos'         => 'phar://GamesRadar/DataMapper/Videos.php',
	'GamesRadar\DataMapper\Screenshots'    => 'phar://GamesRadar/DataMapper/Screenshots.php',
	'GamesRadar\DataMapper\Cheats'         => 'phar://GamesRadar/DataMapper/Cheats.php',
	'GamesRadar\DataMapper\Games'          => 'phar://GamesRadar/DataMapper/Games.php',
	'GamesRadar\DataMapper\Game'           => 'phar://GamesRadar/DataMapper/Game.php',
	'GamesRadar\DataMapper\Search'         => 'phar://GamesRadar/DataMapper/Search.php',

	'GamesRadar\Entity\Article'    => 'phar://GamesRadar/Entity/Article.php',
	'GamesRadar\Entity\Platform'   => 'phar://GamesRadar/Entity/Platform.php',
	'GamesRadar\Entity\Company'    => 'phar://GamesRadar/Entity/Company.php',
	'GamesRadar\Entity\Franchise'  => 'phar://GamesRadar/Entity/Franchise.php',
	'GamesRadar\Entity\Genre'      => 'phar://GamesRadar/Entity/Genre.php',
	'GamesRadar\Entity\Video'      => 'phar://GamesRadar/Entity/Video.php',
	'GamesRadar\Entity\Screenshot' => 'phar://GamesRadar/Entity/Screenshot.php',
	'GamesRadar\Entity\Cheat'      => 'phar://GamesRadar/Entity/Cheat.php',

	'GamesRadar\Entity\Game\Article' => 'phar://GamesRadar/Entity/Game/Article.php',
	'GamesRadar\Entity\Game\Game'    => 'phar://GamesRadar/Entity/Game/Game.php',
	'GamesRadar\Entity\Game\Games'   => 'phar://GamesRadar/Entity/Game/Games.php',
	'GamesRadar\Entity\Game\Media'   => 'phar://GamesRadar/Entity/Game/Media.php',
	'GamesRadar\Entity\Game\Cheat'   => 'phar://GamesRadar/Entity/Game/Cheat.php',
	'GamesRadar\Entity\Game\Search'  => 'phar://GamesRadar/Entity/Game/Search.php',
	'GamesRadar\Entity\Game\Details' => 'phar://GamesRadar/Entity/Game/Details.php',
);

spl_autoload_register(function($classname) use ($classmap)
{
	if (isset($classmap[$classname])) {
		include $classmap[$classname];
	}
});

__HALT_COMPILER();