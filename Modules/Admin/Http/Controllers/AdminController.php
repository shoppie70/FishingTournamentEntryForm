<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Routing\Controller;
use Modules\Admin\Enums\AdminType;

class AdminController extends Controller
{
    protected string $base_title = '管理者';
    protected array $roles = [];

    public function __construct()
    {
        $this->roles = [
            AdminType::getDescription(AdminType::SUPER_USER),
            AdminType::getDescription(AdminType::KITCHEN_STAFF),
            AdminType::getDescription(AdminType::HOSPITAL_CLERK),
        ];
    }

    public function index()
    {
        $title = $this->base_title . '一覧';
        $base_title = $this->base_title;
        $admin_accounts = Admin::all();

        $route_for_create = route('admin.accounts.create');

        return view('admin::pages.admin.index', compact(
            'title',
            'admin_accounts',
            'route_for_create',
            'base_title'
        ));
    }

    public function create()
    {
        $title = $this->base_title . '作成';
        $endpoint = route('api.admin.v1.accounts.create');
        $method = 'POST';
        $roles = $this->roles;

        return view('admin::pages.admin.edit', compact(
            'title',
            'endpoint',
            'method',
            'roles'
        ));
    }

    public function edit(Admin $admin)
    {
        $title = $this->base_title . '編集';
        $endpoint = route('api.admin.v1.accounts.edit', ['admin' => $admin]);
        $method = 'POST';
        $roles = $this->roles;

        return view('admin::pages.admin.edit', compact(
            'title',
            'admin',
            'endpoint',
            'method',
            'roles'
        ));
    }
}
