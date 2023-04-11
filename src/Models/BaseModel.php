<?php

namespace Ci\Jobs\Models;

use Ci\Jobs\PackageProvider;

abstract class BaseModel extends \Stem\Core\Contracts\Eloquent\BaseModel
{
    protected $connection = PackageProvider::CONNECTION;
}
