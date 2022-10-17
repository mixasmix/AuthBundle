<?php

namespace Mixasmix\AuthBundle\DTO;

class LinkData
{
    public function __construct(
        public readonly string $link,
        public readonly string $state,
    ) {
    }
}
