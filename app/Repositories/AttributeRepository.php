<?php

namespace App\Repositories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class AttributeRepository extends BaseRepository
{
    protected $dataSearch = [];
    private $attribute = null;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
        parent::__construct($attribute , $this->dataSearch);
    }
}
