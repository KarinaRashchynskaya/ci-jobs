<?php

namespace Ci\Jobs\Permissions;

use Stem\Core\Contracts\Permissions\EntityPermissions;
use Stem\Core\Contracts\Permissions\Permission;

/**
 * @method static Permission index()
 * @method static Permission create()
 * @method static Permission edit()
 * @method static Permission editOwn()
 * @method static Permission delete()
 * @method static Permission deleteOwn()
 */
class RatingContextPermissions extends EntityPermissions
{
}
