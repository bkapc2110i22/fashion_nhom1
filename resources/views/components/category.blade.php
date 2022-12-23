<ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
@foreach($cats as $c)
                    <li data-filter=".{{$c->name}}">{{ucfirst($c->name)}}</li>
@endforeach
</ul>
