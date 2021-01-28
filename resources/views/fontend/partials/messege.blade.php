@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
	<p> {{Session::get('success')}}</p>
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-warning">
	<p> {{Session::get('errors')}}</p>
</div>
@endif
@if(Session::has('sticky_error'))
<div class="alert alert-danger text-denger ">
	<p> {{Session::get('sticky_error')}}</p>
</div>
@endif