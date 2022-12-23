@extends('layouts.master')
@section('title','Main owner')
@section('main')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home.index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Giỏ hàng của bạn</h2>
        </div>
        <div class="col-md-6">
        <h2>Tổng tiền: $ {{ $cart->totalAmount}}</h2>
        </div>
</div>
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>@foreach($cart->items as $item)
                                    <td class="cart__product__item">
                                        <img src="{{url('uploads')}}/{{$item->image}}" alt="" width="100">
                                        <div class="cart__product__item__title">
                                            <h6>{{$item->name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ {{$item->price}}</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                        <form action="{{ route('cart.update', $item->id) }}" method="get">
                                        <input type="text" name="quantity" value="{{$item->quantity}}"
                                        style="width:60px; text-align:center">
                                        
                                        </div>
                                    </td>
                                    <td class="cart__total">$ {{$item->quantity * $item->price}}</td>
                                    <td class="cart__close">
                                    <a href=""><button style="background:transparent; border:none" type="submit">
                                    <span class="icon_loading"></span></button></a>
                                    </td>
                                    <td class="cart__close"><a href="{{ route('cart.remove', $item->id) }}" 
                                    onclick="return confirm('Bạn có chắc không?')">
                                    <span class="icon_close"></span></a></td>
                                </tr></form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{route('home.index')}}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 750.0</span></li>
                            <li>Total <span>$ 750.0</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@stop