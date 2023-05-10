<?php

namespace App\Repositories;

use App\Models\AttributeEntity;
use Illuminate\Database\Eloquent\Model;

class AttributeEntityRepository extends BaseRepository
{
    private $attributeEntity = null;

    public function __construct(AttributeEntity $attributeEntity)
    {
        $this->attributeEntity = $attributeEntity;
        parent::__construct($attributeEntity);
    }

    public function assignAttributes($data)
    {
        $flag = false;

        if($this->attributeEntity->where('attribute_id' , $data['attribute_id'])->where('entity_id' , $data['entity_id'])->exists()){
            $flag = false;
        }else{
            $flag = true;
        }

        return $flag;
    }
}
