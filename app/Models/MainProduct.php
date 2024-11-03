<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProduct extends Model
{
    use HasFactory;


public function subProducts()
{
    return $this->hasMany(NewProduct::class, 'main_product_id');
}
}
