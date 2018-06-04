<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $total = DB::select('select * from history_log where status_baca = 0'); 
       $value = DB::select('select * from history_log where status_baca = 0 Order By id_log DESC  LIMIT 5'); 
       $val = count($total);
       //die(dd($val));
       View::share('val', $val);
       View::share('total', $value);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
