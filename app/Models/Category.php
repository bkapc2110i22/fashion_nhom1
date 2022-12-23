<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','status','created_at','updated_at'];

    // product 1 - 1 category 
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function scopeSearch($query)
    {
        $keyword = request('keyword');
        $orderBy = request('orderByName','ASC');
        $query = $query->where('name','LIKE','%'.$keyword.'%')->orderBy('name', $orderBy);
        return $query;
    }
}
