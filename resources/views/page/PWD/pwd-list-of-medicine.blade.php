	@extends('layouts.user')

@section('contents')    <!-- Page Content -->

<style type="text/css">
	a {
    text-decoration: none !important;
}

.card {
 margin: 0px 0px 0px 0px;
}

p{
	font-size: 13px;
}




</style>
<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">Shopping</h1>
			
	<div class="row">
		<div class="col-md-3">

			<div class="card ">

				<div style="margin-right: 0px" class="card-body">
					{!! Form::open(array('url' => '/Normal-User/list-of-searched-medicine-categories', 'files'=>true  ))!!}
					<div class="form-group">
						<label >Select Type</label>
						<select class="form-control" name="search_category">
							
							<option value="select_all">Select All</option>
							@foreach($med_types as $type)
							<option value="{{ $type->medicine_type }}">{{ $type->medicine_type }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">

						
						
							
						<select class="custom-select">
  						<option selected>Select a Category</option>
  						@foreach($categories as $category)
  						<option value="{{$category->category_id}}">{{$category->category_name}}</option>
  						@endforeach
						</select>
						

					</div>	

					<div class="form-group">
						<label >Select Range</label>
						<div class="slidecontainer">
							<input type="range" min="1" max="50" value="25" class="custom-range" id="myRange" name="search_range">
							<p><span id="demo"></span> Km(s)</p>
						</div>
					</div>

					{!!Form::submit('Filter',['class'=>' nav-link btn btn-primary btn-lg btn-block ']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				@foreach($medicines as $medicine)
				<div class="col-md-4 card ">
					<a href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"><img class="card-img-top" src="../../../../{!! $medicine->medicine_image !!}" alt=""></a>
					<p> <b><a style="color: #212529 "  href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}">{!! $medicine->medicine_brand_name !!}</a><br>
				<a style="color: #212529" href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}">{!! $medicine->medicine_generic_name !!}</a><br>
				<a style="color: #212529" href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"> &#8369; {!! $medicine->medicine_price !!}</a></b></p>
				
				</b></p>


				<p align="right"><a style="color: #212529" href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"> {!! $medicine->userpharma->userinfo->pharma_name !!}</a></p>



				</div>
				@endforeach

			 <div class = "col-md-12" align="center">
                        {!! $medicines->render() !!}
                    </div>
		</div>
	</div>
</div>

</div>
<script>
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
		output.innerHTML = this.value;
	}
</script>
@endsection
