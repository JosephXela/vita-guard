<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-only');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'nullable|max:255',
            'address' => 'nullable',
            'birth_date' => 'nullable|date',
            'role' => 'required|in:ADMIN,DOCTOR,MEMBER',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|max:255',
            'address' => 'nullable',
            'birth_date' => 'nullable|date',
            'role' => 'required|in:ADMIN,DOCTOR,MEMBER',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()
                ->route('users.index')
                ->with('success', 'User successfully deleted.');
        } catch (\PDOException $ex) {

            return redirect()
                ->route('users.index')
                ->with('status', 'Cannot delete this user because it is still related to other data.');
        }
    }
}
