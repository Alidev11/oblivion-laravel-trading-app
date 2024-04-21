@extends('layouts.app')
@section('title', 'One setting')
@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center text-primary py-4">Trading Setting Details</h3>

                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ts_sell_step_p" class="form-label">Sell Step</label>
                                    <input type="text" class="form-control" id="ts_sell_step_p"
                                        value="{{ $setting->ts_sell_step_p }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_balance_buy_amt_p" class="form-label">Balance Buy Amount</label>
                                    <input type="text" class="form-control" id="ts_balance_buy_amt_p"
                                        value="{{ $setting->ts_balance_buy_amt_p }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ts_profit_sell_amt_p" class="form-label">Profit Sell Amount</label>
                                    <input type="text" class="form-control" id="ts_profit_sell_amt_p"
                                        value="{{ $setting->ts_profit_sell_amt_p }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_dca_buy_step_p_chain" class="form-label">DCA Buy Step Chain</label>
                                    <input type="text" class="form-control" id="ts_dca_buy_step_p_chain"
                                        value="{{ $setting->ts_dca_buy_step_p_chain }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ts_buy_amt_mltp_chain" class="form-label">Buy Amount Multiplier Chain</label>
                                    <input type="text" class="form-control" id="ts_buy_amt_mltp_chain"
                                        value="{{ $setting->ts_buy_amt_mltp_chain }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_bps_sell_retracement_p" class="form-label">BPS Sell Retracement</label>
                                    <input type="text" class="form-control" id="ts_bps_sell_retracement_p"
                                        value="{{ $setting->ts_bps_sell_retracement_p }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ts_isbpsactive" class="form-label">Is BPS Active</label>
                                    <input type="text" class="form-control" id="ts_isbpsactive"
                                        value="{{ $setting->ts_isbpsactive }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_cover_buy_step_p" class="form-label">Cover Buy Step</label>
                                    <input type="text" class="form-control" id="ts_cover_buy_step_p"
                                        value="{{ $setting->ts_cover_buy_step_p }}" readonly>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col mb-3">
                                    <label for="ts_cover_balance_buy_amt_p" class="form-label">Cover Balance Buy Amount</label>
                                    <input type="text" class="form-control" id="ts_cover_balance_buy_amt_p"
                                        value="{{ $setting->ts_cover_balance_buy_amt_p }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_max_dca_step" class="form-label">Max DCA Step</label>
                                    <input type="text" class="form-control" id="ts_max_dca_step"
                                        value="{{ $setting->ts_max_dca_step }}" readonly>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col mb-3">
                                    <label for="ts_bps_buy_retracement_p" class="form-label">BPS Buy Retracement</label>
                                    <input type="text" class="form-control" id="ts_bps_buy_retracement_p"
                                        value="{{ $setting->ts_bps_buy_retracement_p }}" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ts_cover_profit_sell_amt_p" class="form-label">Cover Profit Sell Amount</label>
                                    <input type="text" class="form-control" id="ts_cover_profit_sell_amt_p"
                                        value="{{ $setting->ts_cover_profit_sell_amt_p }}" readonly>
                                </div>
                            </div>
                            <!-- Add other fields as needed -->

                            <a href="{{ route('mybots.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
