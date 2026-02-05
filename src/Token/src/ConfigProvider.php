<?php declare(strict_types=1);

namespace Exdrals\Token;

use Envms\FluentPDO\Query;
use Exdrals\Shared\Infrastructure\Hydrator\Token\TokenHydratorInterface;
use Exdrals\Shared\Infrastructure\Persistence\Repository\Token\TokenRepositoryInterface;
use Exdrals\Shared\Infrastructure\Persistence\Store\Token\TokenStoreInterface;
use Exdrals\Shared\Utils\UuidFactoryInterface;
use Exdrals\Token\Infrastructure\Hydrator\TokenHydrator;
use Exdrals\Token\Infrastructure\Persistence\Repository\TokenRepository;
use Exdrals\Token\Infrastructure\Persistence\Table\TokenTable;
use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;

readonly class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'routes' => $this->getRoutes(),
            'dependencies' => $this->getDependencies(),
            ConfigAbstractFactory::class => $this->getAbstractFactoryConfig(),
        ];
    }

    public function getRoutes(): array
    {
        return [
        ];
    }

    public function getDependencies(): array
    {
        return [
            'aliases' => [
                TokenHydratorInterface::class => TokenHydrator::class,
                TokenRepositoryInterface::class => TokenRepository::class,
                TokenStoreInterface::class => TokenTable::class,
            ],
            'invokables' => [
            ],
            'factories' => [
                TokenHydrator::class => ConfigAbstractFactory::class,
                TokenRepository::class => ConfigAbstractFactory::class,
                TokenTable::class => ConfigAbstractFactory::class,
            ],

        ];
    }

    public function getAbstractFactoryConfig(): array
    {
        return [
            TokenHydrator::class => [
                UuidFactoryInterface::class,
            ],
            TokenRepository::class => [
                TokenStoreInterface::class,
            ],
            TokenTable::class => [
                Query::class,
                TokenHydratorInterface::class,
            ],
        ];
    }
}
