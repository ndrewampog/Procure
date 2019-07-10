@extends('layouts.user')

@section('contents')
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="Scripts/jquery-3.4.1.js" type="text/javascript"></script>
</head>

<style type="text/css">
  .div1 {
 

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

{!! Form::open(array('url' => '/Normal-User/proceed-with-your-order', 'files'=>true  ))!!}


  <div class="container">
    <h1 class="mt-4 mb-3">Checkout</h1>
    <img src="/image/mappointer.png" width="20" height="20" ></a>
    <small><b>Delivery Address</b></small>

        <div class="col-md-8">
        <div class="container">
          <p>
            <small><b>Name : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br></small>
            
  <div class="form-group">
    <label for="exampleInputEmail1"><small>Enter Street Addresss</small></label>
    <input type="text" class="form-control" name="address">

  </div>


            <small><b>Contact Number : </b>+{!! Auth::user()->userinfo->contact !!} <br></small>
         </p>


        </div>
      </div>
    
 
<hr>
<div class="container">
 <h4>Item Details</h4>
</div>
      @php
      $totalprice = 0;
      $totalquant = 0;
      $payment_total = 0;

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


  <div class="container">

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
              @endphp
            </div>
            <div class="div5">

                    @php
                    echo"&#8369;$totalprice";
                    @endphp


            </div>

          </div>
        </div> 
      </div>
  </div><br>
  @endforeach

      @php
      $totalquant = 0;
      @endphp
      @foreach($carts as $cart)
      @php
      $quant =  $cart->medicine_quantity + 0;
      $totalquant+=$quant;
      @endphp

      @endforeach

  <hr>
  <div class="container">
   <h4>Payment Option</h4>
    <div class="col-md-12">  
      <p class="text-right">

      <input  type="radio" data-toggle="collapse" data-target="#collapseOne"/ name="payment_type" value="Bank Type"> Bank Type&nbsp;

      <input  type="radio" data-toggle="collapse" data-target="#collapseOne"name="payment_type" value="Cash on Delivery" checked/> Cash on Delivery
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">

          <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
              {!! Form::text('bank_name',null,['class'=>'form-control','placeholder'=>'bank Name']) !!}
              {!! Form::text('bank_account',null,['class'=>'form-control','placeholder'=>'bank account']) !!}
              {!! Form::text('bank_password',null,['class'=>'form-control','placeholder'=>'bank password']) !!}
            </div>
          </div>
        </div>
      </div>



      </p>
      <br>
 </div>  
 </div>
 
 <hr>
 <div class="container"> 
  <h4>Order Total</h4>
  <div class="row"> 
    <div class="col-md-6">
    <div class="div2">
      Subtotal (@php echo "$totalquant"; @endphp Item)<br>

    
   <p>

    Item Subtotal<br>
    Shipping total<br>
    <b>Total payment</b>
     

   </p>   
   </div>  
 </div>
    <div class="col-md-6">  
      <p class="text-right">

      @php
      echo"$totalprice";
      @endphp
      {!! Form::hidden('historycart_total_item',$totalquant) !!}
      <br>
      @php
      $total_fee = $pharmacistCount * $totalfee;
      echo"&#8369;$total_fee";

      @endphp   
      {!! Form::hidden('historycart_shipping_fee',$total_fee) !!}<br>
      <b>
      @php
      $payment_total = $totalprice + $total_fee; 
      echo '&#8369;'.number_format((float)$payment_total, 2, '.', '');

      @endphp

                    {!! Form::hidden('historycart_total_prices',$payment_total) !!}
      </b>


      </p>
      <br>
 </div>
 </div>
 <div class="container">
  <div class="row">
    <div class="col text-center">  
       {!!Form::submit('Proceed With Your Order',['class'=>'btn btn-lg btn-primary btn-block']) !!}
    
    </div>
 </div>
 </div>
 <br>

  {!! Form::close() !!}
@endsection