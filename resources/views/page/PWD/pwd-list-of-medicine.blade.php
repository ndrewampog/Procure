@extends('layouts.user')

@section('contents')    <!-- Page Content -->


<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">Shopping
		<small>Subheading</small>
	</h1>
	<div class="row">
		<div class="col-md-4">
			<div class="card mb-4">
				<h5 class="card-header">Search</h5>
				<div class="card-body">
						{!! Form::open(array('url' => '/PWD/list-of-searched-medicine-brands', 'files'=>true  ))!!}

					<div class="input-group">
						<input type="text" class="form-control" name="searchproduct" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-secondary" type="submit">Go!</button>
						</span>
					</div>
				</div>
			</div>
			{!! Form::close() !!}






			<div class="card my-4">
				<h5 class="card-header">Categories</h5>
				<div class="card-body">
					{!! Form::open(array('url' => '/Normal-User/list-of-searched-medicine-categories', 'files'=>true  ))!!}
					<div class="form-group">
						<label >Select Category</label>
						<select class="form-control" name="search_category">
							
							<option value="select_all">Select All</option>
							@foreach($categories as $category)

							<option value="{{ $category->medicine_category }}">{{ $category->medicine_category }}</option>


							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label >Select Type</label><br>
						<div class="col-md-6">
					<button type="button" class="btn btn-primary">Allergy</button><br>
					<button type="button" class="btn btn-primary">Body Pain</button><br>
					<button type="button" class="btn btn-primary">Children's Health</button><br>
					<button type="button" class="btn btn-primary">Cough & Colds</button><br>
					</div>					
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
		<div class="col-md-8">
			<div class="row">
				@foreach($medicines as $medicine)
				<div class="col-md-4">
					<a href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"><img class="card-img-top" src="../../../../{!! $medicine->medicine_image !!}" alt=""></a>
					<div class="card-footer text-muted">
						<a href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}">{!! $medicine->medicine_brand_name !!}</a>
					</div>
					<div class="card-footer text-muted">
						<a href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"> &#8369; {!! $medicine->medicine_price !!}</a>
					</div>
					<div class="card-footer text-muted">
						<a href="/Normal-User/medicine-information/{!! $medicine->medicine_id !!}"> {!! $medicine->userpharma->userinfo->pharma_name !!}</a>
					</div>
				</div>
				@endforeach
			</div>
			 <div class = "col-md-12">
                        {!! $medicines->render() !!}
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
