<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'price',
        'image',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
}
