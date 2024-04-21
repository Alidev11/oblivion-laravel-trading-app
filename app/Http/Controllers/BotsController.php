<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class BotsController extends Controller
{
    public function index()
    {
        // get current user id
        $currentUserId = Auth::user()->id_u;

        // get invests, platforms, trd_settings of current user
        $invests = DB::connection('pgsql')->table('tbl_markets_invests')
            ->where('mi_id_user', $currentUserId)
            ->get();
        // dd($invests[0]->mi_top_balance);


        $platforms = DB::connection('pgsql')->table('tbl_platform')->get();


        $trd_settings = DB::connection('pgsql')
            ->table('tbl_trading_settings')
            ->where('ts_id_user', $currentUserId)
            ->get();

        // return view and variables to be displayed in bot.blade.php
        return view('bots.bot',  compact('invests', 'platforms', 'trd_settings'));
    }

    public function store(Request $request)
    {
        $currentUserId = Auth::user()->id_u;
        $top_balance = DB::connection('pgsql')->table('tbl_markets_invests')
            ->where('mi_id_user', $currentUserId)
            ->first()->mi_top_balance;
        // dd($top_balance);
        $request->validate([
            'mi_allocated_balance' => ['required', 'numeric'],
            'mi_available_balance' => ['required', 'numeric'],
            'mi_dca_step' => ['required', 'integer'],
            'mi_mode' => ['required', 'string'],
            'mi_is_active' => ['required', 'string'],
            'mi_id_ts' => ['required', 'integer'],
            'mi_libelle_market' => ['required', 'string'],
            'mi_base_coin' => ['required', 'string'],
            'mi_quote_coin' => ['required', 'string'],
            'mi_id_platform' => ['required', 'integer'],
            'mi_allow_ew_pr' => ['required', 'string'],
            'mi_auto_compounding' => ['required', 'string'],
        ]);

        // Create a new instance of tbl_markets_invests
        $marketInvest = new Bot();
        if ($request->input('mi_available_balance') > $top_balance)  $top_balance = $request->input('mi_available_balance');

        // Assign values from request to the instance
        $marketInvest->mi_id_user = Auth::user()->id_u;
        $marketInvest->mi_top_balance = $top_balance;
        $marketInvest->mi_allocated_balance = $request->input('mi_allocated_balance');
        $marketInvest->mi_available_balance = $request->input('mi_available_balance');
        $marketInvest->mi_dca_step = $request->input('mi_dca_step');
        $marketInvest->mi_mode = $request->input('mi_mode');
        $marketInvest->mi_is_active = $request->input('mi_is_active');
        $marketInvest->mi_id_ts = $request->input('mi_id_ts');
        $marketInvest->mi_libelle_market = $request->input('mi_libelle_market');
        $marketInvest->mi_stacked_coin = $request->input('mi_base_coin') . "/" . $request->input('mi_quote_coin');
        $marketInvest->mi_id_platform = $request->input('mi_id_platform');
        $marketInvest->mi_allow_ew_pr = $request->input('mi_allow_ew_pr');
        $marketInvest->mi_auto_compounding = $request->input('mi_auto_compounding');

        // Save the instance to the database
        if ($marketInvest->save()) {
            Session::flash('success', 'Bot added successfully');
        } else {
            Session::flash('error', 'Failed to add bot. Please try again.');
        }
        // Redirect back to the previous page with a success message
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function edit($id)
    {
        $bot = Bot::findOrFail($id);
        $platforms = DB::connection('pgsql')->table('tbl_platform')->get();
        $trd_settings = DB::connection('pgsql')->table('tbl_trading_settings')->get();
        // Pass the bot data to the edit-bot modal
        return view('bots.edit', compact('bot', 'platforms', 'trd_settings'));
    }

    public function update(Request $request, $id)
    {
        $invests_unique = DB::connection('pgsql')->table('tbl_markets_invests')
            ->where('id_mi', $id)
            ->first();

        $request->validate([
            'mi_allocated_balance' => ['required', 'numeric'],
            'mi_available_balance' => ['required', 'numeric'],
            'mi_dca_step' => ['required', 'integer'],
            'mi_mode' => ['required', 'string'],
            'mi_is_active' => ['required', 'string'],
            'mi_id_ts' => ['required', 'integer'],
            'mi_libelle_market' => ['required', 'string'],
            'mi_id_platform' => ['required', 'integer'],
            'mi_allow_ew_pr' => ['required', 'string'],
            'mi_auto_compounding' => ['required', 'string'],
        ]);

        // Find the bot by its ID
        $bot = Bot::findOrFail($id);

        // Update the bot attributes
        $bot->mi_top_balance = $invests_unique->mi_top_balance;
        $bot->mi_allocated_balance = $request->input('mi_allocated_balance');
        $bot->mi_available_balance = $request->input('mi_available_balance');
        $bot->mi_dca_step = $request->input('mi_dca_step');
        $bot->mi_mode = $request->input('mi_mode');
        $bot->mi_is_active = $request->input('mi_is_active');
        $bot->mi_id_ts = $request->input('mi_id_ts');
        $bot->mi_libelle_market = $request->input('mi_libelle_market');
        $bot->mi_stacked_coin = $request->input('base_currency') . "/" . $request->input('quote_currency');
        $bot->mi_id_platform = $request->input('mi_id_platform');
        $bot->mi_allow_ew_pr = $request->input('mi_allow_ew_pr');
        $bot->mi_auto_compounding = $request->input('mi_auto_compounding');

        if ($bot->mi_available_balance > $bot->mi_top_balance) {
            $bot->mi_top_balance = $bot->mi_available_balance;
        }

        // Save the changes to the database
        if ($bot->save()) {
            Session::flash('success', 'Bot updated successfully');
        } else {
            Session::flash('error', 'Failed to update bot. Please try again.');
        }

        return response()->json([
            'status' => 'success',
        ]);
    }


    public function destroy($id)
    {
        $bot = Bot::findOrFail($id);
        if (!$bot) {
            Session::flash('error', 'Bot not found');
            return redirect()->back();
        }

        if ($bot->delete()) {
            Session::flash('success', 'Bot deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete bot. Please try again.');
        }

        return response()->json([
            'status' => 'success',
        ]);
    }
}
