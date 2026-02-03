<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/users/Index', [
            'users' => User::with('userRole')->orderBy('id', 'desc')->get(),
            'userRoles' => UserRole::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->filled('confirm_password') && !$request->filled('password_confirmation')) {
            $request->merge(['password_confirmation' => $request->input('confirm_password')]);
        }
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'user_role_id' => 'required|integer|exists:user_roles,id',
        ]);

        User::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        User::find($User->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Frontend may send `confirm_password`; normalize to Laravel's `password_confirmation`
        if ($request->filled('confirm_password') && !$request->filled('password_confirmation')) {
            $request->merge(['password_confirmation' => $request->input('confirm_password')]);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'user_role_id' => 'required|integer|exists:user_roles,id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // If password change requested, require current password to match
        if (!empty($data['password'])) {
            if (empty($data['old_password']) || !Hash::check($data['old_password'], $user->password)) {
                throw ValidationException::withMessages([
                    'old_password' => ['Current password is incorrect.'],
                ]);
            }

            // Leave `password` as plain text — User model casts `password` to `hashed` on set
        }

        // Remove helper fields that are not mass assignable
        unset($data['old_password']);

        $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
