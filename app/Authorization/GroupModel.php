<?php

namespace Myth\Auth\Authorization;

use App\Models\GroupModel as BaseModel;

/**
 * @deprecated 1.2.0 Use Myth\Auth\Models\GroupModel instead
 */
class GroupModel extends BaseModel
{
    protected $returnType             = 'object';
    protected string $permissionModel = PermissionModel::class;
}
