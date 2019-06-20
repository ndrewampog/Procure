@extends('layouts.user')
@section('contents')

<div class="container">
	<h2 class="my-4">List Of History Purchases</h2>
	<div class="row">
		<div class="col-lg-12">
			<div class="accordion" id="accordionExample">
				<div class="card z-depth-0 bordered">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<h5>Order Confirmation</h5>
							</button>
						</h5>
					</div>
					<div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>	
										<th scope="col" class="text-center">Pharmacist Name</th>
										<th scope="col" class="text-center">Total Price</th>
										<th scope="col" class="text-center">Quantity</th>
										<th scope="col" class="text-center">Date Purchase</th>
										<th scope="col" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($cart_order_confirmations as $cart)
									<tr>
										<td class="text-center">
											@php
											$cartid = '';
											@endphp
											@foreach($cart['AllPurchase'] as $pharma)
											@if($pharma->medicineHistoryList->user_id == $cartid)
											@else
											{!! $pharma->medicineHistoryList->userpharma->userinfo->pharma_name !!}<br>
											@endif
											@php
											$value =  $pharma->medicineHistoryList->user_id ;
											$cartid=$value;
											@endphp
											@endforeach
										</td>
										<td class="text-center">&#8369; {!! $cart->historycart_total_price !!}</td>
										<td class="text-center">{!! $cart->historycart_total_item !!}</td>
										<td class="text-center">{!! $cart->created_at !!}</td>
										<td class="text-center">
											<a href="/SeniorCitizen/history-view-purchase-information/{!! $cart->historycart_id !!}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
											{!! Form::open(array('url' => '/Normal-User/cancel-purchase/'.$cart->historycart_id))!!}
											{!! Form::submit('Cancel Order',['class' => 'btn btn-primary btn-sm', 'onclick'=>'return confirm(\'Do you want to cancel this order?\')']) !!} 
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card z-depth-0 bordered">
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse"	data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<h5>Shipped</h5>
							</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>	
										<th scope="col" class="text-center">Pharmacist Name</th>
										<th scope="col" class="text-center">Total Price</th>
										<th scope="col" class="text-center">Quantity</th>
										<th scope="col" class="text-center">Date Purchase</th>
										<th scope="col" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($cart_shippeds as $cart)
									<tr>
										<td class="text-center">

											@php
											$totalprice = '';

											@endphp


											@foreach($cart['AllPurchase'] as $pharma)
											@if($pharma->medicineHistoryList->user_id == $totalprice)

											@else

											{!! $pharma->medicineHistoryList->userpharma->userinfo->pharma_name !!}<br>
											@endif



											@php

											$value =  $pharma->medicineHistoryList->user_id ;
											$totalprice=$value;
											@endphp


											@endforeach
										</td>
										<td class="text-center">&#8369; {!! $cart->historycart_total_price !!}</td>
										<td class="text-center">{!! $cart->historycart_total_item !!}</td>
										<td class="text-center">{!! $cart->created_at !!}</td>
										<td class="text-center">
											<a href="/Normal-User/history-view-purchase-information/{!! $cart->historycart_id !!}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card z-depth-0 bordered">
					<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse"	data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<h5>Cancel Purchase</h5>
							</button>
						</h5>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>	
										<th scope="col" class="text-center">Pharmacist Name</th>
										<th scope="col" class="text-center">Total Price</th>
										<th scope="col" class="text-center">Quantity</th>
										<th scope="col" class="text-center">Date Purchase</th>
										<th scope="col" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($cart_cancel_purchases as $cart)
									<tr>
										<td class="text-center">

											@php
											$totalprice = '';

											@endphp


											@foreach($cart['AllPurchase'] as $pharma)
											@if($pharma->medicineHistoryList->user_id == $totalprice)

											@else

											{!! $pharma->medicineHistoryList->userpharma->userinfo->pharma_name !!}<br>
											@endif



											@php

											$value =  $pharma->medicineHistoryList->user_id ;
											$totalprice=$value;
											@endphp


											@endforeach
										</td>
										<td class="text-center">&#8369; {!! $cart->historycart_total_price !!}</td>
										<td class="text-center">{!! $cart->historycart_total_item !!}</td>
										<td class="text-center">{!! $cart->created_at !!}</td>
										<td class="text-center">
											<a href="/Normal-User/history-view-purchase-information/{!! $cart->historycart_id !!}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card z-depth-0 bordered">
					<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse"	data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<h5>Delivered</h5>
							</button>
						</h5>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>	
										<th scope="col" class="text-center">Pharmacist Name</th>
										<th scope="col" class="text-center">Total Price</th>
										<th scope="col" class="text-center">Quantity</th>
										<th scope="col" class="text-center">Date Purchase</th>
										<th scope="col" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($cart_delivereds as $cart)
									<tr>
										<td class="text-center">

											@php
											$totalprice = '';
											@endphp
											@foreach($cart['AllPurchase'] as $pharma)
											@if($pharma->medicineHistoryList->user_id == $totalprice)
											@else
											{!! $pharma->medicineHistoryList->userpharma->userinfo->pharma_name !!}<br>
											@endif
											@php
											$value =  $pharma->medicineHistoryList->user_id ;
											$totalprice=$value;
											@endphp
											@endforeach
										</td>
										<td class="text-center">&#8369; {!! $cart->historycart_total_price !!}</td>
										<td class="text-center">{!! $cart->historycart_total_item !!}</td>
										<td class="text-center">{!! $cart->created_at !!}</td>
										<td class="text-center">
											<a href="/Normal-User/view-history-for-repurchase-information/{!! $cart->historycart_id !!}"><button type="button" class="btn btn-primary btn-sm">View to Re-Order</button></a>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection