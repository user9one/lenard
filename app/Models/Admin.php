<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'name', // Add other fields if needed
    ];

        public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

}
