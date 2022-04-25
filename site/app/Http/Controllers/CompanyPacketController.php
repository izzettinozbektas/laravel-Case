<?php

namespace App\Http\Controllers;

use App\Models\CompanyPacket;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyPacketController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $datas = $request->all();
        $datas['company_id'] = Auth::guard('api')->user()->id;
        $datas['start_date'] = Carbon::now();
        $datas['end_date']   = Carbon::now()->addMonth(6); // + 6 ay lık paket
        $datas['status'] = 1;

        $cpId = CompanyPacket::create($datas);
        $cpId['packet'] = Package::find($cpId->packet_id);
        return response()->json(['data' => $cpId ],200);
    }
}
