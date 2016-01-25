<?php namespace App\Http\Controllers;

use App\Facades\ViewData;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $shareData = [
            'categoryList' => ViewData::categoryList(),
            'tagList' => ViewData::tagList(),
            'hotArticleList' => ViewData::hotArticleList(5),
        ];
        foreach ($shareData as $key => $dataItem) {
            view()->share($key, $dataItem);
        }
        parent::__construct();
    }
}