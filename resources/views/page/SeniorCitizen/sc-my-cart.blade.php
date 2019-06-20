@extends('layouts.user')

@section('contents')
<style type="text/css">
	.div1 {
		background-color: black;
		color: white;
		width: 100%;
	} 
	.div2 {
		width: 45%;
	} 
	.div3 {
		width: 20%;
	} 
	.div4 {
		width: 20%;
	}
	.div5 {
		width: 15%;
	}  
	img {
		float: left;
	}
</style>


<div class="container">
	{!! Form::open(array('url' => '/Normal-User/proceed-with-your-order', 'files'=>true  ))!!}


	<h2 class="my-4">My Cart</h2>
	<div class="row">

		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="div2">
							<b>&nbsp;&nbsp;&nbsp;Item Details</b>
						</div>
						<div class="div3">
							<b>Price</b>
						</div>
						<div class="div4">
							<b>Quantity</b>
						</div>
						<div class="div5">
							<b>Action</b>
						</div>
					</div>
				</div>
			</div>
			<br>
			@php
			$totalprice = 0;
			

			@endphp
			@foreach($carts as $cart)
			{!! Form::hidden('mycart_id[]',$cart->mycart_id) !!}
			{!! Form::hidden('historycart_total_price[]',$cart->medicine_price) !!}

			@if(Auth::user()->role == "Normal User" )  
			{!! Form::hidden('historycart_discount',0,['class'=>'form-control']) !!}
			@endif

			@if(Auth::user()->role == "PWD" )
			{!! Form::hidden('historycart_discount',20,['class'=>'form-control']) !!}
			@endif
			
			@if(Auth::user()->role == "Senior Citizen" )
			{!! Form::hidden('historycart_discount',20,['class'=>'form-control']) !!}
			@endif


			<div class="card">
				<div class="card-header">{!! $cart->medicineList->userpharma->userinfo->pharma_name !!}</div>
				<div class="card-body">
					<div class="row">
						<div class="div2">
							<p>
								<a href="#"><img width="60" height="60" src="../../../{!! $cart->medicineList->medicine_image !!}" alt=""></a>
								&nbsp;&nbsp;&nbsp;{!! $cart->medicineList->medicine_brand_name !!}<br>

							</p>
						</div>
						<div class="div3">
							&#8369; {!! $cart->medicine_price !!}
						</div>
						<div class="div4">
							{!! $cart->medicine_quantity !!}pc(s)
							@php
							$value =  $cart->medicine_price  * $cart->medicine_quantity;

							$totalprice+=$value;
							$subtotal = $totalprice * ((100-20) / 100);
							
							@endphp
						</div>
						<div clas="div5">

								{!! Form::open(array('url' => '/Normal-User/delete-order/'.$cart->mycart_id))!!}
								{!! Form::submit('Remove',['class' => 'btn btn-danger btn-sm  pull-right', 'onclick'=>'return confirm(\'Are you sure on Removing this item?\')']) !!}
								{!! Form::close() !!}





					</div>
					</div>
				</div> 
			</div><br>
			@endforeach

			@php
			$totalquant = 0 ;
			@endphp
			@foreach($carts as $cart)
			@php
			$quant =  $cart->medicine_quantity + 0;
			$totalquant+=$quant ;


			$subtotalquant = (20 / 100)* $totalprice ;

			
			
			@endphp

			@endforeach
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<b>Summary Order</b><br>
					<p>
						<table  class="table table-borderless">
							<tr>
								<td colspan="3">
									<p class="text-left">
										<h5>Subtotal ( @php echo "$totalquant"; @endphp Item(s) )</h5>

									</p>

									{!! Form::hidden('historycart_total_item',$totalquant) !!}
								</td>
								<td><p class="text-right">
									<h5>
										@php
										echo"&#8369;$totalprice";
										@endphp
									</h5>
								</p>
							</td>
							</tr>

							<tr>
								<td colspan="3">
									<p class="text-left">
										<h5>Discount (
										@php
										echo number_format((float)$subtotalquant, 2, '.', '');
										@endphp )
									</h5>
									</p>



									{!! Form::hidden('historycart_total_item',$totalquant) !!}
								</td>
								<td><p class="text-right">
									<h5>
										@php
										echo number_format((float)$subtotal, 2, '.', '');
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
											$overall_total = $totalprice + $total_fee - $subtotalquant;	
											echo"&#8369;$overall_total";

											@endphp	
											
										{!! Form::hidden('historycart_total_prices',$overall_total) !!}
										</h5>
									</p>
								</td>
							</tr>
						</table>
					</p>



					{!!Form::submit('Proceed With Your Order',['class'=>'btn btn-lg btn-primary btn-block']) !!}
				</div>
			</div>



		</div>
	</div>
	{!! Form::close() !!}
</div>



@endsection