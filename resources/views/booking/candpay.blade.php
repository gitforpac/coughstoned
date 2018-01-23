@extends('layouts.layout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>{{$pagedata['schedule']}}</h3>
<h3>{{ date('M d, Y, D', strtotime($pagedata['schedule'])) }}</h3>
<h3>{{$pagedata['package']->name}}</h3>
<h3>{{$pagedata['package']->location}}</h3>
<h3>{{$pagedata['package']->price}}</h3>
@php
$topay = (string)$pagedata['package']->price;
@endphp
<h3>{{$pagedata['nguest']}}</h3>
<form method="POST" action="/book/{{$pagedata['package']->id}}">
{{ csrf_field() }}
<input type="hidden" value="{{$pagedata['schedule']}}" name="schedule">
<input type="hidden" value="{{$topay}}" name="payment">
<input type="hidden" value="{{$pagedata['nguest']}}" name="nguest">
<button type="submit">Book me</button>
</form>
@endsection