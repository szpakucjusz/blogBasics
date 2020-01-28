<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Model\Post;
use Illuminate\Http\Request;

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
