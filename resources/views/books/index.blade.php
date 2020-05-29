@extends('layouts.app')

@section('content')
	
	<div class="row">
		<div class="col-md-9">
			<div class="breadcrumb add">
				<h1>List of Available Books</h1>
			</div>
			@if(count($books) > 0)
				@foreach($books as $book)
					<div class="border p-2">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<img style="width: 70%" src="/storage/cover_image/{{ $book->cover_image }}">
							</div>
							<div class="col-md-8">
								<h2><a href="{{route('books.show',$book->id)}}">{{$book->title}}</a> </h2>
								<h3>Author: {{$book->author}}</h3>
								<h3>Added on: {{$book->created_at->diffForHumans()}} </h3>
							</div>
						</div>
					</div>
				@endforeach
				{{ $books->links()}}
		@else
			<h1>No book in store</h1>
	@endif
		</div>
		
	</div>
	

@endsection