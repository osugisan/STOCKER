<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id')->get();
        return view('tag.index')
            ->with([
                'user' => Auth::user(),
                'tags' => $tags,
            ]);
    }

    public function create(TagRequest $request)
    {
        Tag::create([
            'name' => $request->input('name'),
            'user_id' => $request->input('user_id')
        ]);

        return redirect()->back()
            ->with('status', 'タグを登録しました');
    }
}
