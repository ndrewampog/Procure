@extends('layouts.user')

@section('contents')
<div class="container">
	<h2 class="my-4">List Of Medicine 
		<small>
			<a href="#" data-toggle="modal" data-target="#at-login"><i class="fas fa-plus"></i></a>
			<a href="#" data-toggle="modal" data-target="#at-login"><i class="fas fa-pen-square"></i></a>
		</small>
	</h2>

	<!-- Marketing Icons Section -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Medicine Name</th>
				<th scope="col">Medicine Price</th>
				<th scope="col">Generic Name</th>
				<th scope="col">Quantity</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td>@fat</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td>@fat</td>
			</tr>
		</tbody>
	</table>
</div>


<div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Welcome InfoTech</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(array('url' => '/Login-User', 'files'=>true  ))!!}
			<div class="modal-body"> 
				<div class="form-group">
					<label for="exampleFormControlFile1">Example file input</label>
					<input type="file" class="form-control-file" id="exampleFormControlFile1">
				</div>
			</div>
			<div class="modal-footer">
				{!!Form::submit('Login',['class'=>'btn btn-primary']) !!}
			</div>  
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Welcome InfoTech</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(array('url' => '/Login-User', 'files'=>true  ))!!}
			<div class="modal-body"> 
				
			</div>
			<div class="modal-footer">
				<a href="/registration-form">Registration</a>
				{!!Form::submit('Login',['class'=>'btn btn-primary']) !!}
			</div>  
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
