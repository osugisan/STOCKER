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
                'index' => 1,
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

    public function edit(TagRequest $request, Tag $tag)
    {
        Tag::whereId($tag->id)->update([
            'name' => $request->input('name'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->back()
            ->with([
                'status', 'タグを変更しました',
                'delete_flg', false,
            ]);
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->back()
            ->with([
                'status', 'タグを削除しました',
                'delete_flg', true,
            ]);
    }
}
