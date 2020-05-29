@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="breadcrumb add">
				<h1>Add New Book</h1>
			</div>
					{!!Form::open(['action'=>['BooksController@update',$book->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
					<div class="form-group">
						{{form::label('title','Book Title')}}
						{{form::text('title',$book->title,['class'=>'form-control'])}}				
					</div>
					<div class="form-group">
						{{form::label('description','Book Description')}}
						{{form::textarea('description',$book->description,['class'=>'form-control'])}}
					</div>
					
					<div class="row">
						<div class="col">
							{{form::label('author','Author Name')}}
							{{form::text('author',$book->author,['class'=>'form-control'])}}
						</div>
						<div class="col">
							{{ form::label('pages','Total Page')}}
							{{ form::text('pages',$book->pages,['class'=>'form-control'])}}
						</div>
					</div>
					<div class="row">
						<div class="col">
							{{ form::label('publish_date','Publish Date')}}
							{{ form::date('publish_date',$book->publish_date,['class'=>'form-control','placeholder'=>'Y-m-d'])}}
						</div>
					</div>
					<div class="form-group">
						{{form::label('file','Upload PDF')}}
						{{form::file('file',['class'=>'form-control-file'])}}
					</div>
					<div class="form-group">
						{{ form::label('cover_image','Add Cover Image') }}
						{{ form::file('cover_image',['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								{{form::label('series_title','Series Title')}}
								{{form::text('series_title',$book->series_title,['class'=>'form-control'])}}
							</div>
							<div class="col">
								{{form::label('series_no','Series Number')}}
								{{form::number('series_no',$book->series_no,['class'=>'form-control'])}}
							</div>
							
						</div>
					</div>
					
					{{form::submit('Submit',['class'=>'btn btn-primary'])}}
					{!! form::close()!!}			
		</div>
		
	</div>
@endsection