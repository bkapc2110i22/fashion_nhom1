<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'customer_id'
    ];

    public function details()
    {
        $data = DB::table('order_details as d')
        ->select('d.quantity','d.price','p.name','p.image', DB::raw('SUM(d.quantity * d.price) as SubTotal'))
        ->join('products as p', 'p.id','=','d.product_id')
        ->where('d.order_id', $this->id)
        ->groupBy('d.quantity','d.price','p.name','p.image')->get();
        return $data;
    }
}
