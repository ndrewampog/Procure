
@extends('layouts.user')

@section('contents')
<style type="text/css">



.div1 {
	background-color: black;
	color: white;
	width: 100%;
} 
.div2 {
	width: 60%;
} 
.div3 {
	width: 30%;
} 
.div4 {
	width: 10%;
} 
img {
	float: left;
}
</style>


<div class="container">
	{!! Form::open(array('url' => '/Normal-User/repurchase-your-order', 'files'=>true  ))!!}
	<h2 class="my-4">Re-Purchase Cart</h2>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="div2">
							<b>&nbsp;&nbsp;&nbsp;Item Details</b>
						</div>
						<div class="div3">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<b>Price</b>
						</div>
						<div class="div4">
							<b>Quantity</b>
						</div>
					</div>
				</div>
			</div><br>
			@php
			$totalprice = 0;

			@endphp


			@if(Auth::user()->role == "Normal User" )  
			{!! Form::hidden('historycart_discount',0,['class'=>'form-control']) !!}
			@endif

			@if(Auth::user()->role == "PWD" )
			{!! Form::hidden('historycart_discount',20,['class'=>'form-control']) !!}
			@endif
			
			@if(Auth::user()->role == "Senior Citizen" )
			{!! Form::hidden('historycart_discount',20,['class'=>'form-control']) !!}
			@endif


			@php
			$totalquant = 0;

			$count = 0;
			$totalCount = 1;
			@endphp
			@foreach($items as $item)
			<div class="card">
				<div class="card-header">{!! $item->medicineHistoryList->userpharma->userinfo->pharma_name !!}</div>
				<div class="card-body">
					<div class="row">
						<div class="div2">
							<p>
								<a href="#"><img width="60" height="60" src="../../../{!! $item->medicineHistoryList->medicine_image !!}" alt=""></a><br>&nbsp;&nbsp;&nbsp;{!! $item->medicineHistoryList->medicine_brand_name !!}<br>
							</p>
						</div>
						<div class="div3">

							@foreach($medicines as $medicine)
							@if($medicine->medicine_id == $item->medicine_id)
							Old Price	&nbsp;	&#8369; {!! $item->historyitem_price !!}<br>
							New Price &#8369; {!! $medicine->medicine_price !!}
									{!! Form::hidden('historyitem_price[]',$medicine->medicine_price) !!}
							@endif
							@endforeach
									{!! Form::hidden('medicine_id[]',$item->medicine_id) !!}
						</div>
						<div class="div4">
							{!! $item->historyitem_quantity !!}<br>
							
							@foreach($medicines as $medicine)

							@if($medicine->medicine_id == $item->medicine_id)
							@php
							$value =  $medicine->medicine_price  * $item->historyitem_quantity;
							$totalprice+=$value;
							@endphp
							@endif	
							@endforeach
									{!! Form::hidden('historyitem_quantity[]',$item->historyitem_quantity) !!}



						</div>
					</div>
				</div> 
			</div><br>
			@endforeach
		</div>


		@php
		$totalquant = 0;
		@endphp
		@foreach($items as $item)
		@php
		$quant =  $item->historyitem_quantity + 0;
		$totalquant+=$quant;
		@endphp
		@endforeach

		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<b>Summary Order</b><br>
					<p>
						<table  class="table table-borderless">
							<tr>
								<td colspan="3">
									<p class="text-left">
										<h5>Subtotal ( @php echo "$totalquant"; @endphp Item )</h5>
									</p>
									{!! Form::hidden('historycart_total_item',$totalquant) !!}
								</td>
								<td>
									<p class="text-right">
										<h5>
											@php
											echo"&#8369;$totalprice";
											@endphp
										</h5>
									</p>
								</td>
							</tr>
							<tr>
								<td colspan="3"><p class="text-left"><h5>Shipping Fee</h5></p></td>
								<td>
									<p class="text-right">
										<h5>
											@php
											$total_fee = $pharmacistCount * $totalfee;
											echo"&#8369;$total_fee";

											@endphp	
											{!! Form::hidden('historycart_shipping_fee',$total_fee) !!}
										</h5>
									</p>
								</td>
							</tr>
							<tr>
								<td colspan="3"><p class="text-left"><h5>Total</h5></p></td>
								<td>
									<p class="text-right">
										<h5>	
											@php
											$overall_total = $totalprice + $total_fee;	
											echo '&#8369;'.number_format((float)$overall_total, 2, '.', '');
											@endphp	
											{!! Form::hidden('historycart_total_prices',$overall_total) !!}
										</h5>
									</p>
								</td>
							</tr>
						</table>
					</p>
					


					@if($stock == "Not Available")

					{!!Form::submit('Out Of Stock',['class'=>'btn btn-lg btn-primary btn-block','disabled']) !!}


					@else
					{!!Form::submit('Re-Purchase',['class'=>'btn btn-lg btn-primary btn-block']) !!}
					@endif





				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>



@endsection

