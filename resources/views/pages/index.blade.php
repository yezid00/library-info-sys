@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<h1>Welcome to Yezid's bookstore</h1>
		{{ $message }}
		<h3>You can go through my catalog by clicking the button below</h3>
		<a href="{{route('books.index')}}" class="btn btn-primary">Books</a>
	</div>
@endsection