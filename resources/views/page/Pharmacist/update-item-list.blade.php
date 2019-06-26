@extends('layouts.user')

@section('contents')

<style type="text/css">
	
	label{

		font-size: 13px;


	}

</style>

{!! Form::open(array('url' => '/Pharmacist/store-item-list/'.$medicine->medicine_id, 'files'=>true  ))!!}
{!! Form::hidden('medicine_id',$medicine->medicine_id) !!}
			<br><br>
				<select class="form-control" name="category_id">
					<option >Select a Category</option>
				@foreach($category as $categories)

				
				
				<option value="{!! $categories->category_id !!}">{!! $categories->category_name !!}</option>

				@endforeach

				</select>


			
			{!!Form::submit('Upload',['class'=>'btn btn-success btn-lg']) !!}
			{!! Form::close() !!}


@endsection
