<div class="list-group">
	@foreach(App\Category::orderBy('id','desc')->where('parent_id',NULL)->get() as $parent)
	
  <a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action " data-toggle="collapse">{!! $parent->name !!}</a>


<div class="collapse" id="main-{{$parent->id}}">
  <div class="list-group">
  @foreach(App\Category::orderBy('id','asc')->where('parent_id',$parent->id)->get() as $child)
    <a href="{{route('category.show',$child->id)}}" class="list-group-item">{{$child->name}}</a>
    @endforeach
  </div>
</div>
  @endforeach

</div>