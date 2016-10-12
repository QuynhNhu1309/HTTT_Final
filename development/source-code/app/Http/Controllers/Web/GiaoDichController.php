<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\DatHangThanhCong;
use App\GiaoDich;
use App\Http\Controllers\Controller;

class GiaoDichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dsGiaoDich = GiaoDich::all();
        $dsGiaoDich_first = GiaoDich::where('id', 4)->orderBy('id','DESC')->get();
        return view('pages.giao-dich',['dsGiaoDich' => $dsGiaoDich,'dsGiaoDich_first'=>$dsGiaoDich_first]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $giaoDich = GiaoDich::findOrFail(rand(1,100));
        Mail::to($request->user()->email)
            ->send(new DatHangThanhCong($giaoDich));
        return redirect()->route('trangchu.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giaoDich = GiaoDich::findOrFail(1);
        return $giaoDich;
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
