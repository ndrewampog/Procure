@extends('layouts.user')

@section('contents')
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


  <div class="container">
    <h1 class="mt-4 mb-3">Checkout</h1>
    <img src="/image/mappointer.png" width="20" height="20" ></a>
    <small><b>Delivery Address</b></small>

        <div class="col-md-8">
        <div class="container">
          <p>
            <small><b>Name : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br></small>
            <small><b>Address : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br></small>
            <small><b>Contact Number : </b>+{!! Auth::user()->userinfo->contact !!} <br></small>
         </p>


        </div>
      </div>
    </div>
 
<hr>
<div class="container">
 <h4>Item Details</h4>
</div>
      @php
      $totalprice = 0;
      $overalltotal = 0;
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

              $totalprice=$value;

              $overalltotal+=$value;


             
              
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

  <hr>
  <div class="container">
   <h4>Payment Option</h4>
 </div>
 
 <hr>
 <div class="container"> 
  <h4>Order Total</h4>
  <div class="row"> 
    <div class="col-md-6">
    <div class="div2">
    
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
      echo"$overalltotal";
      @endphp
      <br>
      @php
      $total_fee = $pharmacistCount * $totalfee;
      echo"&#8369;$total_fee";

      @endphp   
      {!! Form::hidden('historycart_shipping_fee',$total_fee) !!}<br>
      <b>
      @php
      $payment_total = $overalltotal + $total_fee; 
      echo"&#8369;$payment_total";
      @endphp

      </b>


      </p>
      <br>


 </div>
 <p>

  

 </div>
 <div class="container">
  <div class="row">
    <div class="col text-center">
      <button class="btn btn-danger btn-block">PLACE ORDER</button>
    </div>
 </div>
 
@endsection



<!--   <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Sample
  </a>

</p>
<div class="collapse" id="collapseExample">
  

 
</div> -->