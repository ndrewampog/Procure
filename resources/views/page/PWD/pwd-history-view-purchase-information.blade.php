
@extends('layouts.user')

@section('contents')
<style type="text/css">



	.div1 {
		background-color: black;
		color: white;
		width: 100%;
	} 
	.div2 {
		width: 50%;
	} 
	.div3 {
		width: 20%;
	} 
	.div4 {
		width: 10%;
	} 
	img {
		float: left;
	}
</style>


<div class="container">
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
					</div>
				</div>
			</div><br>
			@php
			$totalprice = 0;
			$historyitem_quantity = 0;
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
							&#8369; {!! $item->historyitem_price !!}
						</div>
						<div class="div4">
							{!! $item->historyitem_quantity !!}
							@php
							$value =  $item->historyitem_price  * $item->historyitem_quantity;
							$totalprice+=$value;
							$subtotal = $totalprice * ((100-20) / 100);
							@endphp
						</div>
					</div>
				</div> 
			</div><br>
			@endforeach
		</div>

			@php
			$totalquant = 0 ;
			@endphp
			@foreach($items as $item)
			@php
			$quant =  $item->medicine_quantity + 0;
			$totalquant+=$quant ;


			$subtotalquant = (20 / 100)* $totalprice ;

			
			
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
										<h5>Subtotal ( @php echo "$item->historyitem_quantity"; @endphp Item )</h5>
									</p>
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
										</h5>
									</p>
								</td>
							</tr>
						</table>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection