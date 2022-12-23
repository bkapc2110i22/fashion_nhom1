<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price',
    'sale_price','content','created_at'
    ,'updated_at','status','category_id'];
    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function scopeSearch($query)
    {
        $keyword = request('keyword');
        $orderBy = request('orderByName','ASC');
        $query = $query->where('name','LIKE','%'.$keyword.'%')->orderBy('name', $orderBy);
        return $query;
    }
}
