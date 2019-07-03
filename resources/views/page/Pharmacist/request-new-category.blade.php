@extends('layouts.user')

@section('contents')

<style type="text/css">
	
	label{

		font-size: 13px;
	}
	a {
    text-decoration: none !important;
    color: #495057;
}

</style>
  	<div class="container">
      <br><br><br>
      <h2>Request a new Category</h2>
  		<div class="col-lg-6">
  		{!! Form::open(array('url' => 'Pharmacist/request-new-category', 'files'=>true  ))!!}
  			<div class="form-group">
               <label class="control-label">Category Name : </label><br>
               {!! Form::text('category_name',null,['class'=>'form-control','placeholder'=>'Category Name']) !!}
            </div>

              <div class="form-group">
    			<label for="exampleFormControlTextarea1">State your reason for adding this Category.</label>
    			<textarea class="form-control" id="exampleFormControlTextarea1" name="category_message" rows="3">
    				
    			</textarea>
  			</div>
  		 {!!Form::submit('Submit',['class'=>'btn btn-lg btn-success btn-block']) !!}
  		 <br>

  		</div>
  	</div>	
	


@endsection
