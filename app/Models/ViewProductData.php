<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ViewProductData extends Product
{
    // use HasFactory;
    public $table = "view_product_data";
}
