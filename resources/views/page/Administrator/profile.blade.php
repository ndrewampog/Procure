@extends('layouts.user')

@section('contents')
<br><br>
<div class="container">

{!! $user->userinfo->fname !!}



					<a href="/Administrator/update-profile/{!! $user->id !!}"><i class="far fa-edit"></i></a>
</div>


@endsection


