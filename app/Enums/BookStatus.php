<?php

namespace App\Enums;

enum BookStatus: string
{
    case BORROWED = 'borrowed';
    case READY = 'ready';
}
