<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $title
 */
class Post extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
    ];
}
