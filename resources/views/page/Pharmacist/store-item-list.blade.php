@extends('layouts.user')

@section('contents')

<style type="text/css">
	
	label{

		font-size: 13px;


	}


</style>

<div class="container"><br><br>
	<div class="row">
		
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
			<h5 class="modal-title">Upload CSV : </h5><br>
			{!! Form::open(array('url' => '/Pharmacist/add-new-medicine', 'files'=>true  ))!!}
			<div class="form-group">
				<input type="file" class="form-control-file" name="medicines">
			</div>
			{!!Form::submit('Upload',['class'=>'btn btn-success btn-lg']) !!}
			{!! Form::close() !!}
		</div>
		<div class="col-md-6">

			<a href="/Pharmacist/download-csv/{!! Auth::user()->id !!}"><button type="button" class="btn btn-primary btn-lg">Export Empty CSV Data </button></a>
			<a href="/Pharmacist/download-csv/{!! Auth::user()->id !!}"><button type="button" class="btn btn-primary btn-lg">Export CSV Data </button></a>
		</div>

	</div>

	<h2 class="my-4">List Of Medicine </h2>

	<!-- Marketing Icons Section -->
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th class="text-center" scope="col">#</th>
				<th class="text-center" scope="col">Medicine Brand Name</th>
				<th class="text-center" scope="col">Medicine Category</th>
				<th class="text-center" scope="col">Medicine Price</th>
				<th class="text-center" scope="col">Quantity</th>
				<th class="text-center" scope="col">Generic Name</th>
				<th class="text-center" scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicines as $medicine)
			<tr>
			
				<th scope="row">{!! $medicine->medicine_id !!}</th>
				<td>{!! $medicine->medicine_brand_name !!}</td>
				@if($medicine->category_id == "NULL")
				<td></td>
				@else
				<td>{!! $medicine->medicineCategoryList->category_name !!}</td>
				@endif

				<td>{!! $medicine->medicine_price !!}</td>
				<td>{!! $medicine->medicine_quantity !!}</td>
				<td>{!! $medicine->medicine_generic_name !!}</td>
				<td class="text-center">

					<a href="/Pharmacist/item-information/{!! $medicine->medicine_id !!}"><i class="far fa-eye"></i></a>
					
					<a href="#" data-toggle="modal" data-target="#at-login"><i class="far fa-trash-alt"></i></a>
					
					<a href="/Pharmacist/update-item-list/{!! $medicine->medicine_id !!}" class="btn btn-success btn-md">Update</a>
					
				</td>
			{!! Form::close() !!}
			</tr>
			@endforeach
		</tbody>
	</table>
</div>






	</div>
</div>


@endsection
