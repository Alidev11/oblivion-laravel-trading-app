<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getChartData()
    {
        $data = DB::connection('pgsql')->table('tbl_actions')
            ->select('act_date', 'act_ccy_receiv')
            ->get();


        return response()->json($data);
    }
}
