<?php

namespace Mixasmix\AuthBundle\DTO;

use DateTimeImmutable;

class UserData
{
    public function __construct(
        public readonly string $subject,
        public readonly ?string $id,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly array $roles,
        public readonly ?bool $isHasPassword,
        public readonly ?DateTimeImmutable $createdAt,
        public readonly ?DateTimeImmutable $updatedAt,
    ) {
    }
}
