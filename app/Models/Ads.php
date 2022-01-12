<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'picture',
        'location',
        'description',
        'price',
        'proprietaire_id'

    ];

    public function category() {
        return $this->hasOne(App\Models\Category::class);
    }

}
