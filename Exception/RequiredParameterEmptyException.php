<?php

namespace Mixasmix\AuthBundle\Exception;

use Throwable;

class RequiredParameterEmptyException extends AbstractAuthException
{
    public function __construct(
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            'Отсутствует обязательный параметр ' . $message,
            $code,
            $previous,
        );
    }
}
