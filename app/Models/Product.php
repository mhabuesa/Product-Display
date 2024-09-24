<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'product_id');
    }
}
