@extends('layouts.user')

@section('contents')

<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">{!!$medicine->medicine_brand_name!!}
	</h1>

	<!-- Portfolio Item Row -->
	<div class="row">

		<div class="col-md-6">
			<img class="img-fluid rounded mx-auto d-block" src="../../{!!$medicine->medicine_image!!}" alt="">
		</div>

		<div class="col-md-6">
			<h3 class="my-3">Details</h3>
			<ul>
				<li>Brand Generic name = {!!$medicine->medicine_generic_name!!}</li>
				<li>Medicine Category = {!!$medicine->medicine_category!!}</li> 
				<li>Medicine Volume = {!!$medicine->medicine_volume!!}</li>
				<li>Stocks = {!!$medicine->medicine_quantity!!}</li>
				<li>Price = &#8369;{!!$medicine->medicine_price!!}</li>
			</ul>

			<h3 class="my-3">Medicine Description</h3>
			<p>{!! $medicine->medicine_description !!}</p> 

			<div class="container mt-5">
				{!! Form::open(array('url' => '/SeniorCitizen/add-to-cart', 'files'=>true  ))!!}
				{!! Form::hidden('medicine_id',$medicine->medicine_id) !!}
				{!! Form::hidden('user_id',Auth::user()->id) !!}
				{!! Form::hidden('medicine_price',$medicine->medicine_price) !!}
				@if(Auth::user()->role == "Normal User" )
				{!! Form::hidden('medicine_status','No') !!}
				@endif
				@if(Auth::user()->role == "PWD" )
				{!! Form::hidden('medicine_status','yes') !!}
				@endif
				@if(Auth::user()->role == "Senior Citizen" )
				{!! Form::hidden('medicine_status','yes') !!}
				@endif
				<div class="row">
					<div class="col-sm-6">
						<label class="control-label">Quantity</label>
						<div class="input-group mb-3">
							{!! Form::number('medicine_quantity',1,['class'=>'form-control form-control-sm','min'=>'1'])!!}
						</div>
						<div class="col-sm-4">
							{!!Form::submit('Add Cart',['class'=>'btn btn-primary']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		</div>
	</div>
	@endsection
