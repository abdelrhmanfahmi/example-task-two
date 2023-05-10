<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function attribute_entities()
    {
        return $this->hasMany(AttributeEntity::class);
    }

    public function entity_users()
    {
        return $this->hasMany(EntityUser::class);
    }
}
