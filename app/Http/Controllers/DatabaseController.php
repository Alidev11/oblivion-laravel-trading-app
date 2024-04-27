<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    protected $dbConnection;

    public function __construct()
    {
        // Set the default database connection
        $this->dbConnection = 'pgsql';
    }

    public function checkConnection()
    {
        try {
            // Run the raw SQL query on the specified database connection
            $result = DB::connection('pgsql')->table('tbl_actions')
            ->select('act_date', 'act_ccy_receiv')
            ->get();

            // Return the results
            return response()->json($result);
        } catch (\Exception $e) {
            // If an exception is thrown, handle the error
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    protected function runQueryOnConnection($query, $connection)
    {
        // Use dependency injection to specify the database connection
        return DB::connection($connection)->select($query);
    }
}
