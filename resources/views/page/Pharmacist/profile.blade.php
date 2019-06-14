@extends('layouts.user')

@section('contents')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img class="img-fluid  mx-auto d-block" src="../{!! Auth::user()->userinfo->profile_image !!}" alt="">
		</div>

		<div class="col-md-8">
			<div class="container">
				<p>
					<b>Name : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br>
					<b>Address : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br>
					<b>Telephone Number : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br>
					<b>Company Address : </b>{!! Auth::user()->userinfo->fname !!} {!! Auth::user()->userinfo->mname !!} {!! Auth::user()->userinfo->lname !!}<br>
					
				</p>
				<p>
					
					bussiness paper
				</p>
			</div>
		</div>
	</div><br>
	
</div>
<br>
<br>
<br>
@endsection
