<?php

namespace Mixasmix\AuthBundle\DTO;

use JsonSerializable;

class LinkData implements JsonSerializable
{
    public function __construct(
        public readonly string $link,
        public readonly string $state,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'link' => $this->link,
            'state' => $this->state,
        ];
    }
}
