<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

        $appTheme = config('theme');
        Carbon::setLocale('zh');
        View::share('optionList', []);

        View::prependNamespace(
            $appTheme, base_path() . DIRECTORY_SEPARATOR .  'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $appTheme
        );
    }
}
