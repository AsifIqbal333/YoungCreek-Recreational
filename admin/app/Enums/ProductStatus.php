<?php

namespace App\Enums;

enum ProductStatus: string
{
    case ACTIVE = 'active';
    case DRAFT = 'draft';
    case INACTIVE = 'inactive';
}
