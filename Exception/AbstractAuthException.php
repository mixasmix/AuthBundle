<?php

namespace Mixasmix\AuthBundle\Exception;

use Exception;
use Throwable;

abstract class AbstractAuthException extends Exception
{
    public function __construct(
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            'Ошибка авторизации: ' . $message,
            $code,
            $previous,
        );
    }
}
