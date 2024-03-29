@extends('layouts.user')

@section('contents')    <!-- Page Content -->


<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				 @if($medicines->isEmpty())
         <div class = "col-md-6">
            <div class="col-sm-12">
                <div class = "caption">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="col-sm-12">   
                                <h3>No Record</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
			</div>
			 <div class = "col-md-12">
                        {!! $medicines->render() !!}
                    </div>
		</div>
	</div>
</div>
@endsection


