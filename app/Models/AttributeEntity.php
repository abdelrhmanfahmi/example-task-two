<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeEntity extends Model
{
    use HasFactory;

    protected $fillable = ['entity_id' , 'attribute_id'];

    public function entity()
    {
        return $this->belongsTo(Entity::class , 'entity_id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class , 'attribute_id');
    }
}
