<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    private string $base_title = '職員';

    public function index()
    {
        $title = $this->base_title . '一覧';
        $users = User::with('department')->paginate(30);
        $route_for_create = route('admin.user.create');
        $base_title = $this->base_title;

        return view('admin::pages.user.index', compact(
            'title',
            'base_title',
            'users',
            'route_for_create'
        ));
    }

    public function edit(User $user)
    {
        $title = $user->name;
        $departments = Department::all();
        $method = 'POST';
        $endpoint = route('api.admin.v1.user.update', ['user' => $user]);

        return view('admin::pages.user.edit', compact(
            'title',
            'user',
            'departments',
            'method',
            'endpoint'
        ));
    }

    public function create()
    {
        $title = $this->base_title . 'の新規追加';
        $departments = Department::all();
        $method = 'POST';
        $endpoint = route('api.admin.v1.user.create');

        return view('admin::pages.user.edit', compact(
            'title',
            'departments',
            'method',
            'endpoint'
        ));
    }

    public function bulk_update()
    {
        $title = $this->base_title . 'の一括登録';
        $method = 'POST';
        $endpoint = route('api.admin.v1.user.bulk.create');

        return view('admin::pages.user.bulk', compact(
            'title',
            'method',
            'endpoint'
        ));
    }
}
