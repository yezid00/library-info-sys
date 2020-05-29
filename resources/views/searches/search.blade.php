@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-7">
			<h2>Search</h2>
			{!!Form::open(['action'=>'SearchController@postSearch','method'=>'POST'])!!}
				<div class="form-group">
					<div class="row">
						<div class="col">
							{{form::text('query',null,['class'=>'form-control','placeholder'=>'enter book title to search'])}}
						</div>
						
					</div>
				</div>
				{{form::submit('Search',['class'=>'btn btn-primary'])}}
			{!! Form::close()!!}

			<hr>
			
		</div>
		
			
	</div>
	

@endsection