<?php declare(strict_types=1);

namespace Exdrals\Shared\Domain\Token;

use Exdrals\Shared\Utils\CollectionInterface;
use Exdrals\Token\Domain\Token;

/**
 * @method Token offsetGet(mixed $offset)
 * @method Token current()
 * @method Token first()
 * @method Token last()
 */
interface TokenCollectionInterface extends CollectionInterface
{
}
