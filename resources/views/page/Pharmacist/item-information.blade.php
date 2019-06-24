@extends('layouts.user')

@section('contents')

<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">

			<h2>{!!$medicine->medicine_brand_name!!}</h2>
	</h1>

	<!-- Portfolio Item Row -->
	<div class="row">

		<div class="col-md-7">
			<img class="img-fluid rounded mx-auto d-block" src="../../{!!$medicine->medicine_image!!}" alt="">
		</div>

		<div class="col-md-5">
			<h3 class="my-3">Details</h3>
			<ul>
				<li>Brand Generic name = {!!$medicine->medicine_generic_name!!}</li>
				<li>Medicine Category = {!!$medicine->medicine_type!!}</li>
				<li>Medicine Volume = {!!$medicine->medicine_volume!!}</li>
				<li>Stocks = {!!$medicine->medicine_quantity!!}
				@if($medicine->medicine_quantity == '0')
				Out Of Stock
				@endif
			</li>
				<li>Price = {!!$medicine->medicine_price!!}</li>
			</ul>
			 
			<h3 class="my-3">Medicine Description</h3>
				<p>{!! $medicine->medicine_description !!}</p> 
		</div>
	</div>
</div>
@endsection
