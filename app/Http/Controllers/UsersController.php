<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateRole;
use App\Model\Task;
use App\Model\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        return view('user.list', ['users' => DB::table(User::TABLE_NAME)->paginate(10),
            'roles' => User::getUserAllRoles()]);
    }

    public function editRole(UpdateRole $request)
    {
        $this->userRepository->editRole($request);
        return json_encode(['success' => true]);
    }

}
