<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trangHienTai = $request->input('trang');
        $idTinhTrang = $request->input('tinhtrang');
        $idTaiKhoan = $request->input('taikhoan');
        $dsDonHang = $this->execute_sp('dbo.sp_get_dsdonhang', ['Trang' => $trangHienTai, 
                                                    'idTinhTrang' => $idTinhTrang,
                                                    'idTaiKhoan' => $idTaiKhoan,
                                                    'SoDongMotTrang' => 10]);
        return view('admin.donhang.danhsach')
                    ->with('dsDonHang', $dsDonHang);
    }

    public function execute_sp($procedureName, $parameters)
    {
        $spParameters = '';
        foreach($parameters as $key => $parameter){
            if(isset($parameter)){
                $spParameters .= ' @'.$key.'='.$parameter;
            }
        }
        $spParameters = trim($spParameters);
        $spParameters = str_replace(' ',',',$spParameters);
        $preparedStatement = 'DECLARE	@return_value int
                                EXEC	@return_value = '.$procedureName.' '.
                                $spParameters.
                                'SELECT	\'Return Value\' = @return_value';
        $result = DB::select($preparedStatement);
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donhang.them');
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
        //
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
