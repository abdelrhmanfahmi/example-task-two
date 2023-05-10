<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'data_type'];

    public function attribute_entities()
    {
        return $this->hasMany(AttributeEntity::class);
    }
}
