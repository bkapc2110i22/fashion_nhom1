@foreach($blog as $b)
<div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="{{url('uploads')}}/{{$b->image}}"></div>
                        <div class="blog__item__text">
                            <h6><a href="{{route('home.blog_detail', ['blog'=> $b->id, 'slug' => Str::slug($b->name)])}}">{{$b->desc}}</a></h6>
                            <ul>
                                <li>by <span>{{$b->name}}</span></li>
                                <li>{{$b->created_at}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
@endforeach