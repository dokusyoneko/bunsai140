<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Novel;

class AdminNovelController extends Controller
{
    public function index()
    {
        $status = request('status', 'active');

        $query = Novel::with(['user'])->withTrashed();

        if ($status === 'active') {
            $query->whereNull('deleted_at');
        } elseif ($status === 'deleted') {
            $query->whereNotNull('deleted_at');
        }

        $novels = $query->get();

        return view('admin.novel', compact('novels', 'status'));
    }

    public function delete($id)
    {
        $novel = Novel::findOrFail($id);
        $novel->delete(); // SoftDeletes の delete()
        return redirect()->back()->with('status', '削除しました');
    }

    public function restore($id)
    {
        $novel = Novel::withTrashed()->findOrFail($id);
        $novel->restore(); // SoftDeletes の restore()
        return redirect()->back()->with('status', '復元しました');
    }
}
