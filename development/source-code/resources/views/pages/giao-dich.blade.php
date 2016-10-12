@extends("layouts.main")

@section('title', 'abcd')

@section('content')
<p>{{"Phạm Lê Quỳnh Như"}}<p>
<p>{{"Phạm Lê Quỳnh Như"}}<p>

@foreach($dsGiaoDich as $value)
    {{ "id: ".$value->id }}
    <br>
    {{ "giao dịch cod: ".$value->giao_dich_cod }}
    <br><br>
    <p>
    @foreach($value->dsChiTietGiaoDich as $item)
        {{ $item->don_gia_san_pham }}
    @endforeach
    </p>
@endforeach
@foreach($dsGiaoDich_first as $val)
{{ $val }}
@endforeach
@endsection