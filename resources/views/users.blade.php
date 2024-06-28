

{{-- @if ($username=="samir")
admin
@else
user
@endif --}}

{{-- <h1 style="color: red">users</h1> --}}
{{-- {{$username}} --}}

{{--
// echo $username
//  ?>
 --}}
{{--
if( $username=="samir")
{
echo"admin";
}else{
echo"user";
} --}}

@extends('layouts.nav')

@section('title')
users
@endsection

@section('cont')
<h1>users</h1>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master users.</p>
@endsection
