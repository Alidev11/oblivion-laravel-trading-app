<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mi';
    protected $table = 'tbl_markets_invests';
    protected $connection = 'pgsql';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mi_id_user',
        'mi_top_balance',
        'mi_allocated_balance',
        'mi_available_balance',
        'mi_dca_step',
        'mi_mode',
        'mi_is_active',
        'mi_id_ts',
        'mi_libelle_market',
        'mi_stacked_coin',
        'mi_id_platform',
        'mi_allow_ew_pr',
        'mi_auto_compounding',
    ];
}
