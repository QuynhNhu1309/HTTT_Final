<?php

namespace App\Http\Controllers\Web;

use App\DanhMucSanPham;
use App\SanPham;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idDanhMuc = $request->danhmuc;
        $dsDanhMucSanPham = DanhMucSanPham::all();
        $dsSanPham=SanPham::where('ten', 'LIKE', '%BMN%')->get();;
        return view('pages.danh-sach-san-pham',compact('dsSanPham','dsDanhMucSanPham','idDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sanPhamSlug)
    {
        $splittedSanPhamSlug = explode("-", $sanPhamSlug);
        $idSanPham = $splittedSanPhamSlug[count($splittedSanPhamSlug)-1];
        $sanPhamIns = SanPham::where('id', $idSanPham)->first();
        return view('pages.san-pham',['sanPham' => $sanPhamIns]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
