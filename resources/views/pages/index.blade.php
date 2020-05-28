@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-7">
			<div class="breadcrumb add">
				<h1>Add New Book</h1>
			</div>
					{!!Form::open(['action'=>'BooksController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
					<div class="form-group">
						{{form::label('title','Book Title')}}
						{{form::text('title',null,['class'=>'form-control'])}}				
					</div>
					<div class="form-group">
						{{form::label('description','Book Description')}}
						{{form::textarea('description',null,['class'=>'form-control'])}}
					</div>
					
					<div class="row">
						<div class="col">
							{{form::label('author','Author Name')}}
							{{form::text('author',null,['class'=>'form-control'])}}
						</div>
						<div class="col">
							{{ form::label('pages','Total Page')}}
							{{ form::text('pages',null,['class'=>'form-control'])}}
						</div>
					</div>
					<div class="row">
						<div class="col">
							{{ form::label('publish_date','Publish Date')}}
							{{ form::date('publish_date',\Carbon\Carbon::now(),['class'=>'form-control'])}}
						</div>
					</div>
					<div class="form-group">
						{{form::label('file','Upload PDF')}}
						{{form::file('file',['class'=>'form-control-file'])}}
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								{{form::label('series_title','Series Title')}}
								{{form::text('series_title',null,['class'=>'form-control'])}}
							</div>
							<div class="col">
								{{form::label('series_no','Series Number')}}
								{{form::number('series_no',null,['class'=>'form-control'])}}
							</div>
							
						</div>
					</div>
					
					{{form::submit('Submit',['class'=>'btn btn-primary'])}}
					{!! form::close()!!}			
		</div>
		<div class="col-md-4 offset-md-1">
			<h2>Search</h2>
			{!!Form::open(['action'=>'SearchController@postSearch','method'=>'POST'])!!}
				<div class="form-group">
					<div class="row">
						<div class="col">
							{{form::text('search',null,['class'=>'form-control','placeholder'=>'search'])}}
						</div>
					</div>
				</div>
				{{form::submit('Search',['class'=>'btn btn-primary'])}}
			{!! Form::close()!!}
		</div>
	</div>
	
		

		


@endsection