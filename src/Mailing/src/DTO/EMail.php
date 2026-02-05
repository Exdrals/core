<?php declare(strict_types=1);

namespace Exdrals\Mailing\DTO;

use Exdrals\Shared\Domain\Enum\DataType;
use OpenApi\Attributes as OA;

#[OA\Schema()]
readonly class EMail
{
    public function __construct(
        #[OA\Property(
            description: 'The E-Mail',
            type: DataType::STRING->value,
        )]
        public string $email,
    ) {
    }

    public static function fromString(string $email): self
    {
        return new self($email);
    }
}
