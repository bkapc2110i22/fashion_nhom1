@foreach($banner as $b)
<div class="banner__item">
                        <div class="banner__text">
                            <span>{{$b->title}}</span>
                            <h1>{{$b->name}}</h1>
                            <a href="#">Shop now</a>
                        </div>
</div>
@endforeach