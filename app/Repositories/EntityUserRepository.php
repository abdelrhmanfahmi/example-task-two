<?php

namespace App\Repositories;

use App\Models\EntityUser;
use Illuminate\Database\Eloquent\Model;

class EntityUserRepository extends BaseRepository
{
    private $entityUser = null;

    public function __construct(EntityUser $entityUser)
    {
        $this->entityUser = $entityUser;
        parent::__construct($entityUser);
    }
}
