<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'gender', 'phone', 'email', 'address', 'nationality', 'date_of_birth', 'education_background', 'preffrerd_contact_mode'];
    protected $guarded = ['id'];
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'date',
        'updated_at' => 'date',
        'date_of_birth' => 'date'
    ];
}
