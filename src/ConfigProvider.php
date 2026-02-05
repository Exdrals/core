<?php declare(strict_types=1);

namespace Exdrals\Core;

use Laminas\ConfigAggregator\ConfigAggregator;

class ConfigProvider
{
    public function __invoke(): array
    {
        $aggregator = new ConfigAggregator([
            \Exdrals\Mailing\ConfigProvider::class,
            \Exdrals\Shared\ConfigProvider::class,
            \Exdrals\Token\ConfigProvider::class,
        ]);

        return $aggregator->getMergedConfig();
    }
}
