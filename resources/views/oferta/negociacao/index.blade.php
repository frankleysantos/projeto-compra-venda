@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <negociacao-produtos-component :oferta_id="{{$oferta_id}}"></negociacao-produtos-component>
</div>
@endsection