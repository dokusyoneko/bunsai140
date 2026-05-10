<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Novel;

class AdminNovelController extends Controller
{
    public function index()
    {
        $novels = Novel::withTrashed()->get();
        return view('admin.novel', compact('novels'));
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
