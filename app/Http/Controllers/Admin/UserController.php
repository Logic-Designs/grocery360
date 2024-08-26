<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();

        // Return the admin view with the users
        return view('admin.user.index', compact('users'));
    }

    /**
     * Delete a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists and delete
        if ($user) {
            $user->delete();
            return back()->with('success', 'User deleted successfully');
        }

        // If user not found, return an error message
        return back()->with('error', 'User not found');
    }
}
