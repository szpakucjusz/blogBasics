<?php
namespace App\Http\Controllers;

/**
 * Class IndexController
 */
class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

}
