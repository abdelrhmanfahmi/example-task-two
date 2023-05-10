<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityUser extends Model
{
    use HasFactory;

    protected $fillable = ['entity_id' , 'user_id' , 'values'];

    public function entity()
    {
        return $this->belongsTo(Entity::class , 'entity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
