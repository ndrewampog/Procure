@extends('layouts.user')

@section('contents')
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
				<th class="text-center" scope="col">Medicine Price</th>
				<th class="text-center" scope="col">Quantity</th>
				<th class="text-center" scope="col">Stocks</th>
				<th class="text-center" scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicines as $medicine)
			<tr>
				<th scope="row">{!! $medicine->medicine_id !!}</th>
				<td>{!! $medicine->medicine_brand_name !!}</td>
				<td>{!! $medicine->medicine_price !!}</td>
				<td>{!! $medicine->medicine_quantity !!}</td>
				<td>{!! $medicine->medicine_generic_name !!}</td>
				<td class="text-center">

					<a href="/Pharmacist/item-information/{!! $medicine->medicine_id !!}"><i class="far fa-eye"></i></a>
					<a href="#" data-myid="{!! $medicine->medicine_id !!}" data-myprice="{!! $medicine->medicine_price !!}" data-myquantity="{!! $medicine->medicine_quantity !!}"   data-toggle="modal" data-target="#edit" data-whatever="@mdo"><i class="far fa-edit"></i></a>
					<a href="#" data-toggle="modal" data-target="#at-login"><i class="far fa-trash-alt"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload your images</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			{!! Form::open(array('url' => '/Pharmacist/update-medicine', 'files'=>true  ))!!}
			<div class="modal-body">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Profile Image:</label>
							{!! Form::file('medicine_image',['class'=>'form‐control','id'=>'medicine_image'  ]) !!}
						</div> 
						<div class="form-group">
							<img id="image" src="" name="medicine_image"  class="img-fluid" alt=" Your Image" />
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
						<div class="dropdown">

						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    						Medicine Category
  						</button>
  						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
   								 <button class="dropdown-item" type="button">Allergy</button>
   								 <button class="dropdown-item" type="button">Body Pain</button>
   								 <button class="dropdown-item" type="button">Children's Health</button>
   								 <button class="dropdown-item" type="button">Cough & Colds</button>
  								</div>								
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
