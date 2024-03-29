@extends('layouts.user')

@section('contents')
<br><br>
<div class="container">
	<h2 class="my-4">List Of Pharmacies
		<small>
			<a href="#" data-toggle="modal" data-target="#at-login"><i class="fas fa-plus"></i></a>
			<a href="#" data-toggle="modal" data-target="#at-login"><i class="fas fa-pen-square"></i></a>
		</small>
	</h2>

	<!-- Marketing Icons Section -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Pharmacy Name</th>
				<th scope="col">Pharmacy Username</th>
				<th scope="col">Branch</th>
				<th scope="col">Pharmacy Email</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>

			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<!-- <td><a href="">{!! $user->userinfo->pharma_name !!}</a></td>
				-->
				<td>
					<a href="#" 
					data-myid="{!! $user->id !!}" 
					data-myprofileimg="{!! $user->profile_image !!}" 
					data-myprofile="{!! $user->userinfo->pharma_name !!}"
					data-myprofilename="{!! $user->userinfo->pharma_name !!}"
					data-mypharmaemail="{!! $user->email !!}"
					data-mybusidinfo="{!! $user->userinfo->pharma_certificate !!}"      
					data-toggle="modal" 
					data-target="#profile" 
					data-whatever="@mdo">
					{!! $user->userinfo->pharma_name !!}</a>
				</td>


				<td>{!! $user->username !!}</td>
				<td>{!! $user->userinfo->pharma_name !!}</td>
				<td>{!! $user->email !!}</td>
				<td>{!! $user->status !!}</td>
				<td>{{ Form::open(array('url' => '/Administrator/Registration-Approval/'.$user->id))}}
					{!! Form::submit('✔',['class' => 'btn btn-success', 'onclick'=>'return confirm(\'Are you sure on Accepting this User?\')']) !!} 
					{{ Form::close() }}
					{!! Form::open(array('url' => '/Administrator/Registration-Decline/'.$user->id))!!}
					{!! Form::submit('✖',['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure on rejecting this individual?\')']) !!} 
					{!! Form::close() !!} 
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





