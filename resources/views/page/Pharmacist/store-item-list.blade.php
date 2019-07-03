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

			<a href="/Pharmacist/download-csv/{!! Auth::user()->id !!}"><button type="button" class="btn btn-primary btn-xs">Export Empty CSV Data </button></a>
			<a href="/Pharmacist/download-csv/{!! Auth::user()->id !!}"><button type="button" class="btn btn-primary btn-xs">Export CSV Data </button></a>
			<a href="/Pharmacist/request-new-category/"><button type="button" class="btn btn-primary btn-xs">Request new Category </button></a>
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
				<td>
				
					
				@if(is_null($medicine->category_id))

					<a href="/Pharmacist/update-item-list/{!! $medicine->medicine_id !!}" class="btn btn-success btn-block">Add Category</a>				

				
				@else
				@foreach($category as $cat)
					@if($medicine->category_id == $cat->category_id)

							{!! $cat->category_name !!}&nbsp;&nbsp;<a href="/Pharmacist/update-item-list/{!! $medicine->medicine_id !!}" class="far fa-edit"></a>
					@else
					@endif
				@endforeach

				@endif
				
				</td>

				<td>{!! $medicine->medicine_price !!}</td>
				<td>{!! $medicine->medicine_quantity !!}</td>
				<td>{!! $medicine->medicine_generic_name !!}</td>
				<td class="text-center">

					<a href="/Pharmacist/item-information/{!! $medicine->medicine_id !!}"><i class="far fa-eye"></i></a>
					<a href="#" data-myid="{!! $medicine->medicine_id !!}" data-myprice="{!! $medicine->medicine_price !!}" data-myquantity="{!! $medicine->medicine_quantity !!}"   data-toggle="modal" data-target="#edit" data-whatever="@mdo"><i class="far fa-edit"></i></a>
					
					<a href="#" data-toggle="modal" data-target="#at-login"><i class="far fa-trash-alt"></i></a>
					
					
					
				</td>
			{!! Form::close() !!}
			</tr>
			@endforeach
		</tbody>
	</table>
</div>




<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title">Edit Medicine Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			{!! Form::open(array('url' => '/Pharmacist/update-medicine', 'files'=>true  ))!!}
			<div class="modal-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Medicine Image:</label>
							{!! Form::file('medicine_image',['class'=>'form‐control','id'=>'medicine_image'  ]) !!}
						</div> 
						<div class="form-group">
							<img id="image" src="" name="medicine_image"  class="img-fluid"  />
						</div>  
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<input type="hidden" name="medicine_id" id="mid_id">
							<label for="recipient-name" class="control-label">Medicine Price :</label>
							<input type="text" class="form-control" name="medicine_price" id="pri">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="control-label">Medicine Quantity :</label>
							<input type="text" class="form-control" name="medicine_quantity" id="quan">
						</div>						
										
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!!Form::submit('Upload',['class'=>'btn btn-success btn-lg']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>


@endsection
