<?php

namespace Modules\Front\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Front\Http\Requests\Auth\StoreUserRequest;
use Modules\Front\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    public function register()
    {
        $title = '初回ログイン';
        $endpoint = route('user.register');
        $method = 'POST';

        return view('front::auth.register', compact(
            'title',
            'endpoint',
            'method',
        ));
    }

    public function find(Request $request)
    {
        $request->validate([
            'staff_number' => ['required', 'integer'],
        ]);

        $user = User::StaffNumber($request->get('staff_number'))->first();

        if ($user === null) {
            return redirect()->back()->withErrors(['message' => 'このユーザーは存在しません。職員番号をご確認の上、再度お試しください。']);
        }

        if ($user->is_temporary === false) {
            return redirect()->back()->withErrors(['message' => 'このユーザーは既に登録済みです。']);
        }

        return redirect(route('user.create'))->with('user', $user)->with('staff_number', $request->get('staff_number'));
    }

    public function create()
    {
        $title = '職員情報の入力';
        $user = session('user');
        $endpoint = '';
        $method = 'POST';
        $departments = Department::all();

        return view('front::auth.create', compact(
            'title',
            'user',
            'endpoint',
            'method',
            'departments'
        ));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::StaffNumber($request->get('staff_number'))->first();
        session()->flush();

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'department_id' => $request->get('department_id'),
            'password' => Hash::make($request->get('password')),
            'is_temporary' => 0,
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
