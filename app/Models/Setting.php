<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ts';
    protected $table = 'tbl_trading_settings';
    protected $connection = 'pgsql';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ts_sell_step_p',
        'ts_balance_buy_amt_p',
        'ts_profit_sell_amt_p',
        'ts_dca_buy_step_p_chain',
        'ts_buy_amt_mltp_chain',
        'ts_bps_sell_retracement_p',
        'ts_isbpsactive',
        'ts_cover_buy_step_p',
        'ts_cover_balance_buy_amt_p',
        'ts_max_dca_step',
        'ts_bps_buy_retracement_p',
        'ts_cover_profit_sell_amt_p',
    ];
}
