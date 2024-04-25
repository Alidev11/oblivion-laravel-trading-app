<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();
        $users_trading_data = DB::connection('pgsql')->table('tbl_users_trading_data')
            ->where('utd_id_user', $currentUserId)
            ->get();

        $trd_settings = DB::connection('pgsql')
            ->table('tbl_trading_settings')
            ->where('ts_id_user', $currentUserId)
            ->get();

        return view('settings.settings',  compact('trd_settings', 'users_trading_data'));
    }

    // one setting
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.one-setting', compact('setting'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'ts_sell_step_p' => ['required', 'numeric'],
                'ts_balance_buy_amt_p' => ['required', 'numeric'],
                'ts_profit_sell_amt_p' => ['required', 'numeric'],
                'ts_dca_buy_step_p_chain' => ['required', 'integer'],
                'ts_buy_amt_mltp_chain' => ['required', 'numeric'],
                'ts_bps_sell_retracement_p' => ['required', 'numeric'],
                'ts_isbpsactive' => ['required', 'string'],
                'ts_cover_buy_step_p' => ['required', 'numeric'],
                'ts_cover_balance_buy_amt_p' => ['required', 'numeric'],
                'ts_max_dca_step' => ['required', 'integer'],
                'ts_bps_buy_retracement_p' => ['required', 'numeric'],
                'ts_cover_profit_sell_amt_p' => ['required', 'numeric'],
            ]);
            $setting = new Setting();
            // Assign values from request to the instance
            $setting->ts_id_user = Auth::user()->id_u;
            $setting->ts_sell_step_p = $request->input('ts_sell_step_p');
            $setting->ts_balance_buy_amt_p = $request->input('ts_balance_buy_amt_p');
            $setting->ts_profit_sell_amt_p = $request->input('ts_profit_sell_amt_p');
            $setting->ts_dca_buy_step_p_chain = $request->input('ts_dca_buy_step_p_chain');
            $setting->ts_buy_amt_mltp_chain = $request->input('ts_buy_amt_mltp_chain');
            $setting->ts_bps_sell_retracement_p = $request->input('ts_bps_sell_retracement_p');
            $setting->ts_isbpsactive = $request->input('ts_isbpsactive');
            $setting->ts_cover_buy_step_p = $request->input('ts_cover_buy_step_p');
            $setting->ts_cover_balance_buy_amt_p = $request->input('ts_cover_balance_buy_amt_p');
            $setting->ts_max_dca_step = $request->input('ts_max_dca_step');
            $setting->ts_bps_buy_retracement_p = $request->input('ts_bps_buy_retracement_p');
            $setting->ts_cover_profit_sell_amt_p = $request->input('ts_cover_profit_sell_amt_p');

            // Save the instance to the database
            if ($setting->save()) {
                Session::flash('success', 'Trading setting added successfully');
            } else {
                Session::flash('error', 'Failed to add setting. Please try again.');
            }

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // Handle exception and create a session variable 'error' with a message
            Session::flash('error', 'Failed to add setting. ' . $e->getMessage());

            // Return error response
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'ts_sell_step_p' => ['required', 'numeric'],
                'ts_balance_buy_amt_p' => ['required', 'numeric'],
                'ts_profit_sell_amt_p' => ['required', 'numeric'],
                'ts_dca_buy_step_p_chain' => ['required', 'integer'],
                'ts_buy_amt_mltp_chain' => ['required', 'numeric'],
                'ts_bps_sell_retracement_p' => ['required', 'numeric'],
                'ts_isbpsactive' => ['required', 'string'],
                'ts_cover_buy_step_p' => ['required', 'numeric'],
                'ts_cover_balance_buy_amt_p' => ['required', 'numeric'],
                'ts_max_dca_step' => ['required', 'integer'],
                'ts_bps_buy_retracement_p' => ['required', 'numeric'],
                'ts_cover_profit_sell_amt_p' => ['required', 'numeric'],
            ]);

            // Find the setting by its ID
            $setting = Setting::findOrFail($id);

            // Update the setting attributes
            $setting->ts_sell_step_p = $request->input('ts_sell_step_p');
            $setting->ts_balance_buy_amt_p = $request->input('ts_balance_buy_amt_p');
            $setting->ts_profit_sell_amt_p = $request->input('ts_profit_sell_amt_p');
            $setting->ts_dca_buy_step_p_chain = $request->input('ts_dca_buy_step_p_chain');
            $setting->ts_buy_amt_mltp_chain = $request->input('ts_buy_amt_mltp_chain');
            $setting->ts_bps_sell_retracement_p = $request->input('ts_bps_sell_retracement_p');
            $setting->ts_isbpsactive = $request->input('ts_isbpsactive');
            $setting->ts_cover_buy_step_p = $request->input('ts_cover_buy_step_p');
            $setting->ts_cover_balance_buy_amt_p = $request->input('ts_cover_balance_buy_amt_p');
            $setting->ts_max_dca_step = $request->input('ts_max_dca_step');
            $setting->ts_bps_buy_retracement_p = $request->input('ts_bps_buy_retracement_p');
            $setting->ts_cover_profit_sell_amt_p = $request->input('ts_cover_profit_sell_amt_p');

            // Save the changes to the database
            if ($setting->save()) {
                Session::flash('success', 'Trading setting updated successfully');
            } else {
                Session::flash('error', 'Failed to update trading setting. Please try again.');
            }

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // Handle exception and create a session variable 'error' with a message
            Session::flash('error', 'Failed to update trading setting. Please try again. ' . $e->getMessage());

            // Return error response
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $setting = Setting::findOrFail($id);
            if (!$setting) {
                Session::flash('error', 'Setting not found');
                return redirect()->back();
            }

            if ($setting->delete()) {
                Session::flash('success', 'Setting deleted successfully');
            } else {
                Session::flash('error', 'Failed to delete setting. Please try again.');
            }

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // Handle exception and create a session variable 'error' with a message
            Session::flash('error', 'Failed to delete setting. ' . $e->getMessage());

            // Return error response
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
