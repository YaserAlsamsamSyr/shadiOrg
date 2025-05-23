<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable=[
        "firstName",
        "lastName",
        "fatherName",
        "motherName",
        "iss",
        "birthDate",
        "birthDateArea",
        "joinType",
        "status",
        "user_id"
    ];
    // relation
    public function user(){
        return $this->belongsTo(User::class);
    }
}
