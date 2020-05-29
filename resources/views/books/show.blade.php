@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<div>
				<img style="width: 50%;" src="/storage/cover_image/{{ $book->cover_image }}">
			</div>
				<hr>
				<h1> Title: {{ $book->title}}</h1>
				<h2>Author: {{ $book->author}}</h2>
			<h2>Published on: {{ $book->publish_date}}</h2>
				<h2>Series: {{ $book->series_title}}</h2>
				<h2>Series No. {{ $book->series_no}}</h2>
				<br>
				<h2>Description:<br><h4> {{ $book->description}}</h4></h2>
		</div>
		<div class="col-md-3">
			<div class="jumbotron">
				<h5>{{ $book->title}}</h5>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
					</div>
					<div class="col-sm-6">
						{!! Form::open(['action'=>['BooksController@destroy',$book->id],'method'=>'DELETE'])!!}
					{{form::submit('Delete',['class'=>'btn btn-danger'])}}
				{!! form::close()!!}
					</div>
				</div>
			
			</div>
		</div>
	</div>
@endsection