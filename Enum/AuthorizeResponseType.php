<?php

namespace Mixasmix\AuthBundle\Enum;

enum AuthorizeResponseType: string
{
    case TOKEN = 'token';
    case CODE = 'code';
}
