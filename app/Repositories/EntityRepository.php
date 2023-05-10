<?php

namespace App\Repositories;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Model;

class EntityRepository extends BaseRepository
{
    protected $dataSearch = [];
    private $entity = null;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
        parent::__construct($entity , $this->dataSearch);
    }
}
