<?php

namespace Modules\Admin\Http\Controllers\Api;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\Api\CreateUserRequest;
use Modules\Admin\Http\Requests\Api\UpdateUserRequest;
use Modules\Admin\UseCases\User\SaveEncodedCsvAction;
use Rap2hpoutre\FastExcel\FastExcel;
use RuntimeException;

class UserController extends Controller
{
    public function create(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->fill($request->all())->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: '職員情報を正常に作成できませんでした。',
            ]);
        }

        $response = [
            'status' => '200',
            'redirect' => route('admin.user.index'),
        ];

        return response()->json($response);
    }

    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            $user->fill($request->all())->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: '職員情報を正常に更新できませんでした。',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'message' => '職員情報を正常に更新しました。',
        ]);
    }

    public function bulk(Request $request, User $user): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            $encoded_file = (new SaveEncodedCsvAction())($request->file('csv'));
            $result = (new FastExcel())->configureCsv(',')->importSheets($encoded_file);

            foreach ($result as $row) {
                foreach ($row as $item) {
                    $param = [
                        'staff_number' => $item['職員番号'],
                        'name' => $item['職員名'],
                    ];

                    if (User::where('staff_number', $param['staff_number'])->exists()) {
                        throw new RuntimeException('職員番号：' . $param['staff_number'] . 'の方は既にシステムに登録されています。');
                    }

                    User::create([
                        'staff_number' => $param['staff_number'],
                        'name' => $param['name'],
                        'is_temporary' => true,
                        'is_retired' => false,
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: '職員情報を正常に更新できませんでした。',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'message' => '職員情報を正常に更新しました。',
        ]);
    }
}
