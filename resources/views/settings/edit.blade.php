<div class="container mt-5 bg-light p-4 rounded border border-1 shadow-sm" id="edit-sett-container" style="display: none;">
    <h3 class="text-primary">Edit trading settings information</h3>
    <hr>
    <form action="javascript:void(0)" method="POST" id="edit-sett-form" class="text-dark">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_ts" value="" class="id_ts">
        <div class="row mb-3">
            <div class="col">
                <label for="ts_sell_step_p" class="col-form-label">Sell Step:</label>
                <input type="number" class="form-control bg-white ts_sell_step_p" id="ts_sell_step_p" name="ts_sell_step_p" value="">
            </div>
            <div class="col">
                <label for="ts_balance_buy_amt_p" class="col-form-label">Balance Buy Amount:</label>
                <input type="number" class="form-control bg-white ts_balance_buy_amt_p" id="ts_balance_buy_amt_p" name="ts_balance_buy_amt_p" value="">
            </div>
            <div class="col">
                <label for="ts_profit_sell_amt_p" class="col-form-label">Profit Sell Amount:</label>
                <input type="number" class="form-control bg-white ts_profit_sell_amt_p" id="ts_profit_sell_amt_p" name="ts_profit_sell_amt_p" value="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ts_dca_buy_step_p_chain" class="col-form-label">DCA Buy Step Chain:</label>
                <input type="number" class="form-control bg-white ts_dca_buy_step_p_chain" id="ts_dca_buy_step_p_chain" name="ts_dca_buy_step_p_chain" value="">
            </div>
            <div class="col">
                <label for="ts_buy_amt_mltp_chain" class="col-form-label">Buy Amount MLTP Chain:</label>
                <input type="number" class="form-control bg-white ts_buy_amt_mltp_chain" id="ts_buy_amt_mltp_chain" name="ts_buy_amt_mltp_chain" value="">
            </div>
            <div class="col">
                <label for="ts_bps_sell_retracement_p" class="col-form-label">BPS Sell Retracement:</label>
                <input type="number" class="form-control bg-white ts_bps_sell_retracement_p" id="ts_bps_sell_retracement_p" name="ts_bps_sell_retracement_p" value="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ts_isbpsactive" class="col-form-label">Is BPS Active:</label>
                <select name="ts_isbpsactive" class="form-select bg-white ts_isbpsactive" id="ts_isbpsactive">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>
            <div class="col">
                <label for="ts_cover_buy_step_p" class="col-form-label">Cover Buy Step:</label>
                <input type="number" class="form-control bg-white ts_cover_buy_step_p" id="ts_cover_buy_step_p" name="ts_cover_buy_step_p" value="">
            </div>
            <div class="col">
                <label for="ts_cover_balance_buy_amt_p" class="col-form-label">Cover Balance Buy Amount:</label>
                <input type="number" class="form-control bg-white ts_cover_balance_buy_amt_p" id="ts_cover_balance_buy_amt_p" name="ts_cover_balance_buy_amt_p" value="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ts_max_dca_step" class="col-form-label">Max DCA Step:</label>
                <input type="number" class="form-control bg-white ts_max_dca_step" id="ts_max_dca_step" name="ts_max_dca_step" value="">
            </div>
            <div class="col">
                <label for="ts_bps_buy_retracement_p" class="col-form-label">BPS Buy Retracement:</label>
                <input type="number" class="form-control bg-white ts_bps_buy_retracement_p" id="ts_bps_buy_retracement_p" name="ts_bps_buy_retracement_p" value="">
            </div>
            <div class="col">
                <label for="ts_cover_profit_sell_amt_p" class="col-form-label">Cover Profit Sell Amount:</label>
                <input type="number" class="form-control bg-white ts_cover_profit_sell_amt_p" id="ts_cover_profit_sell_amt_p" name="ts_cover_profit_sell_amt_p" value="">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
</div>
