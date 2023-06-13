<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.admin.user.index', [
            'users' => User::ListByActorRole()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.user.create', [
            'projects' => Project::all(),
            'genders' => User::STATUSGENDER,
            'roles' => Role::listRoleByActor()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $attr = Arr::except($request->validated(), 'password');
        $attr['password'] = bcrypt($request->validated('password'));

        $user = User::create($attr);
        if ($user) {
            $user->assignRole(Role::find($request->validated('role')));
            flash()->success('Berhasil membuat user baru');
        } else {
            flash()->error('Gagal membuat user baru');
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('app.admin.user.edit', [
            'user' => $user,
            'projects' => Project::all(),
            'genders' => User::STATUSGENDER,
            'roles' => Role::listRoleByActor()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $attr = Arr::except($request->validated(), 'password');
        if ($request->validated('password')) {
            $attr['password'] = bcrypt($request->validated('password'));
        }

        if ($user->update(Arr::except($attr, ['role']))) {
            if (!in_array($request->validated('role'), $user->roles()->pluck('id')->toArray())) {
                $oldRole = $user->getRoleNames()->first();
                if ($oldRole !== null) {
                    $user->removeRole($oldRole);
                }

                $newRole = Role::find($request->validated('role'));
                $user->assignRole($newRole->name);
            }
            flash()->success('Sukses update user!');
        } else {
            flash()->error('Gagal update user!');
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
