<?php
namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function list()
    {
        return view('user.list', ['users' => DB::table(User::TABLE_NAME)->paginate(10)]);
    }

}
