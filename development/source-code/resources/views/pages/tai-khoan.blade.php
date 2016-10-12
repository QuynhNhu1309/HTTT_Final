@extends('layouts.main')

@section('title','taikhoan')

@section('sidebar')
    <ul>
        <li>Xuân</li>
        <li>Xinh</li>
    </ul>
@endsection

@section('content')
    <p>Xuân</p>

    @foreach($dsTaiKhoan as $taiKhoan)
    <p>{{$taiKhoan->ten_dang_nhap}}</p>
    @endforeach
@endsection

