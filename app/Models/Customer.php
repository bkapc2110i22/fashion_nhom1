<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;
class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function orders()
    // {
    //     return $this->hasMany(Order::class, 'customer_id','id')->orderBy('created_at','DESC');
    // }

    public function orders(Type $var = null)
    {
        $data = Order::select('orders.id','orders.name','orders.email','orders.phone','orders.address','orders.created_at','orders.status', DB::raw('SUM(order_details.price * order_details.quantity) as TotalPrice'))
        ->join('order_details', 'order_details.order_id','=','orders.id')
        ->groupBy('orders.id','orders.name','orders.email','orders.phone','orders.address','orders.created_at','orders.status')
        ->orderBy('orders.created_at','DESC');


        return $data;
    }
}