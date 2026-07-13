<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDOException;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('role', 'MEMBER')->get();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
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
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'role' => 'MEMBER',
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member successfully added.');
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
    public function edit(User $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $member)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $member->id,
            'phone' => 'nullable|max:255',
            'address' => 'nullable',
            'birth_date' => 'nullable|date',
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'role' => 'MEMBER',
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $member)
    {
        try {
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Successfully Deleted A Member');
        } catch (PDOException $ex) {
            $msg = "Make Sure There Is No Related Data Before Deleting It. Please Contact Administrator To Know More About It.";
            return redirect()->route('members.index')->with('status', $msg);
        }
    }
}
