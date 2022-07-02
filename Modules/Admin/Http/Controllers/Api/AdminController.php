<?php

namespace Modules\Admin\Http\Controllers\Api;

use App\Models\Admin;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\Api\UpdateAdminRequest;

class AdminController extends Controller
{
    protected string $base_title = 'プロフィール';

    public function create(UpdateAdminRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            Admin::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'role' => $request->get('role'),
                'password' => Hash::make($request->get('password')),
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: $this->base_title . 'を作成できませんでした。',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'message' => $this->base_title . 'を正常に作成しました。',
        ]);
    }

    public function edit(UpdateAdminRequest $request, Admin $admin): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            $admin->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'role' => $request->get('role'),
                'password' => Hash::make($request->get('password')),
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: $this->base_title . 'を更新できませんでした。',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'message' => $this->base_title . 'を正常に更新しました。',
            'data' => $admin,
        ]);
    }
}
