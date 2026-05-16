<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $status = request('status', 'active');

        $query = User::query();

        if ($status === 'active') {
            $query->where('is_banned', false);
        } elseif ($status === 'banned') {
            $query->where('is_banned', true);
        }

        $users = $query->get();

        return view('admin.user', compact('users', 'status'));
    }


    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = true;
        $user->save();
        return back();
    }

    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = false;
        $user->save();
        return back();
    }

}
