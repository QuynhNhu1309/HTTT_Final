@extends('layouts.app')

@section('title','Laravel')

@section('sidebar')
    @parent
    <p>List of javascript documents</p>
@endsection
@section('content')
    <ul>
        <li><a href="">Truthy/Falsy</a></li>
        <li><a href="">this</a></li>
        <li><a href="">Callback</a></li>
        <li><a href=""></a></li>
    </ul>
    <form method="POST" action="/post">
    {{ csrf_field() }}
    <label>ten</label><input name="ten" type="text" />
    <label>matkhau</label><input name="matkhau" type="password" />
    <button type="submit">Gui</button>
    </form>
@endsection