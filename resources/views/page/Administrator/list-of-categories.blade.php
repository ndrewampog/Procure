@extends('layouts.user')

@section('contents')
<br><br>
<div class="container">
	<h2 class="my-4">List Of Category
		<small>
			<a href="/Administrator/add-new-category/" class="fas fa-plus">Add a new Category</a>

		</small>
	</h2>

	<!-- Marketing Icons Section -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Pharmacy Name</th>
				<th scope="col">Category Name</th>
				<th scope="col">Message</th>
				<th scope="col">Date</th>
				<th scope="col">Action</th>

			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>

				<td>
				{!!	$category->UserCategory->userinfo->pharma_name	!!}
				</td>
				<td>
					{!! $category->category_name !!}
				</td>
				<td>
				 	{!! $category->category_message !!}
				</td>
				<td>
					{!! $category->created_at !!}	
				</td>
				<td>
					{{ Form::open(array('url' => '/Administrator/Category-Approval/'.$category->category_id))}}
					{!! Form::submit('Approve',['class' => 'btn btn-success', 'onclick'=>'return confirm(\'Are you sure ?\')']) !!} 
					{{ Form::close() }}
					{!! Form::open(array('url' => '/Administrator/Category-Decline/'.$category->category_id))!!}
					{!! Form::submit('Decline',['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure ?\')']) !!} 
					{!! Form::close() !!} 
				</td>



				</td>  

			</tr>
			@endforeach

		</tbody>
	</table>
</div>
<br>
<br>
<br>

<style type="text/css">
input[type="text"] { 

	border: none 
}


input[type="text"]:disabled{

	background-color:#FFFFFF;
}
</style>



<div class="modal fade bd-example-modal-lg" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">

				
				<h5 class="modal-title">
					
					
						
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>

			<div class="modal-body">

				<div class="row">
					<div class="col-md-6">

						<div class="form-group">
							
							<input type="text" size="25" id="pharmacypnamee" disabled >
							
						</div>

					</div>
					<div class="col-md-6 " align="right">

						<div class="form-group">
							
							<input type="text" size="25" id="pharmacypnamee" disabled >
							
						</div>

					</div>					
				</div>
				<div class="row">
					<div class="col-md-4">

						<div class="form-group">
							
							<input type="text" size="25" id="pharmacypnamee" disabled readonly>
							
						</div>

					</div>
					<div class="col-md-8 " align="right">

						<div class="form-group">
							
							
							
						</div>

					</div>					
				</div>







			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
	
		</div>
	</div>
</div>



@endsection





