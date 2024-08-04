<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->whereNull('deleted_at')->latest('id')->paginate(10);

        return view('admins.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            if ($request->isMethod('POST')) {
                $dataInput = $request->except('_token');

                if ($request->hasFile('avatar')) {
                    $dataInput['avatar'] = Storage::put('users', $request->file('avatar'));
                } else {
                    $dataInput['avatar'] = null;
                }

                User::create($dataInput);

                return redirect()->route('admin.users.index')->with('success', 'Thêm thành công');
            };
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admins.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if ($request->isMethod('PUT')) {
                $dataInput = $request->except('_token', '_method');

                $user = User::findOrFail($id);

                if ($request->hasFile('avatar')) {
                    if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                        Storage::disk('public')->delete($user->avatar);
                    }
                    $dataInput['avatar'] = Storage::put('users', $request->file('avatar'));
                } else {
                    $dataInput['avatar'] = $user->avatar;
                }

                $user->update($dataInput);

                return redirect()->route('admin.users.index')->with('success', 'Thao tác thành công');
            };
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Thao tác xóa mềm

        return redirect()->back()->with('success', 'Thao tác thành công');
    }

    public function resetPass(Request $request, string $id)
    {
        try {
            if ($request->isMethod('PUT')) {
            
                $defaultPassword = 'abcd12345';

                $user = User::findOrFail($id);

                $user->update([
                    'passwrod' => $defaultPassword
                ]);

                return redirect()->route('admin.users.index')->with('success', 'Mật khẩu của bạn reset thành : abcd12345');
            };
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
