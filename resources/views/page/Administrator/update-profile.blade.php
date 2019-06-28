@extends('layouts.user')

@section('contents')
<br><br>
<div class="container">

{!! $user->userinfo->fname !!}



{!! Form::open(array('url' => '/Administrator/store-profile/'.$user->id, 'files'=>true  ))!!}
{!! Form::hidden('user_info_id', $user->userinfo->id ) !!}
    

                                    {!! Form::text('lname',$user->userinfo->lname,['class'=>'form-control','placeholder'=>'lname']) !!}
                                    {!! Form::text('fname',$user->userinfo->fname,['class'=>'form-control','placeholder'=>'fname']) !!}
                                    {!! Form::text('mname',$user->userinfo->mname,['class'=>'form-control','placeholder'=>'mname']) !!}
      
      {!!Form::submit('Upload',['class'=>'btn btn-success btn-lg']) !!}
      {!! Form::close() !!}

</div>

@endsection



