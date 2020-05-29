@extends('layouts.app')

@section('content')
	@if(count($books)>0)
		<h3>Results</h3>
		<ul>
			@foreach($books as $result)
				<li><a href="{{ route('books.show',$result->id) }}"> {{ $result->title }}</a></li>

			@endforeach
		</ul>
		@else
		<h2>No match found</h2>

	@endif
		
@endsection