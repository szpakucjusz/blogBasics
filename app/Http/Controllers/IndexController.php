<?php
namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Support\Facades\DB;

/**
 * Class IndexController
 */
class IndexController extends Controller
{
    public function index()
    {
        return view('welcome', ['posts' => DB::table(Post::TABLE_NAME)->paginate(10)]);
    }

}
