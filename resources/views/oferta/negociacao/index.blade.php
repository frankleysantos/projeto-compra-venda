@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <negociacao-produtos-component :oferta_id="{{$oferta_id}}" :user_logado="{{$user_logado}}"></negociacao-produtos-component>
</div>
@endsection