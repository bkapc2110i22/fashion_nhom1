@foreach($products as $p)
    <!-- normal price <div class="label new">New</div> -->
    @if($p->sale_price == 0)
            <div class="col-lg-3 col-md-4 col-sm-6 mix @foreach($cats as $c) @if($c->id == $p->category_id) {{$c->name}} @endif @endforeach">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{url('uploads')}}/{{$p->image}}">
                        <ul class="product__hover">
                            <li><a href="{{route('home.productDetail', ['product'=> $p->id, 'slug' => Str::slug($p->name)])}}"><span class="arrow_expand"></span></a></li>
                            <li><a href="{{route('home.shop-cart')}}"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="{{ route('cart.add', $p->id) }}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$p->name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ {{$p->price}}</div>
                    </div>
                </div>
            </div>
    @endif
@endforeach
@foreach($products as $p)
    <!-- sale prize -->
    @if($p->sale_price > 0)
    <div class="col-lg-3 col-md-4 col-sm-6 mix @foreach($cats as $c) @if($c->id == $p->category_id) {{$c->name}} @endif @endforeach">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{url('uploads')}}/{{$p->image}}">
                        <div class="label sale">Sale</div>
                        <ul class="product__hover">
                            <li><a href="{{route('home.productDetail', ['product'=> $p->id, 'slug' => Str::slug($p->name)])}}"><span class="arrow_expand"></span></a></li>
                            <li><a href="{{route('home.shop-cart')}}"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="{{ route('cart.add', $p->id) }}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$p->name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ {{$p->sale_price}} <span>$ {{$p->price}}</span></div>
                    </div>
                </div>
            </div>
    @endif
    
@endforeach
