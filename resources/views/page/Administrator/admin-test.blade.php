<style type="text/css">
input[type="text"] { 

	border: none 
}


input[type="text"]:disabled{

	background-color:#FFFFFF;
}
</style>



<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<h5 class="modal-title">Medicine Name</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>
			{!! Form::open(array('url' => '/Pharmacist/update-medicine', 'files'=>true  ))!!}


			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">

						<div class="form-group">
							<input type="hidden" name="medicine_id" id="mid_id">
							<label for="recipient-name" class="control-label">Medicine Price :</label>
							<input type="text" size="25" id="pharmacypnamee" disabled readonly>
							
						</div>

					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


				</button>
			</div>






			{!! Form::close() !!}
		</div>
	</div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

				<input type="hidden" name="pharmacy_id" id="pharma_id">
				<h5 class="modal-title">{!! $user->userinfo->pharma_name !!}</h5>
				<input type="hidden" name="medicine_id" id="pharmacyprofile"> 
			<div class="modal-body">

				<form>
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="inputEmail4">{!! $user->userinfo->pharma_name !!}</label>
							<input type="text" name="medicine_id" id="mid_id"> 
							<p>{!! $user->userinfo->pharma_name !!}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">{!! $user->profile_image !!}</label>
							<input type="text" name="medicine_id" id="profileimg">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">{!! $user->email !!}</label>
						<input type="text" name="medicine_id" id="pharmaemail">
					</div>
					<div class="form-group">
						<label for="inputAddress2">{!! $user->userinfo->pharma_certificate !!}</label>
						<input type="hidden" name="medicine_id" id="businessidinfo">
					</div>
				</form>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			

				</button>
			</div>

		</div>
	</div>
</div>

</div>

<!-- <?php echo htmlentities($str); ?> -->