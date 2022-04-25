<?php

namespace App\Http\Controllers;


use App\Models\CompanyPacket;
use App\Models\CompanyPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckCompanyPackageController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $data = User::with('getPackets')->find(Auth::guard('api')->user()->id)->toArray();
        return response()->json(['data' =>$data ],200);
    }
}
