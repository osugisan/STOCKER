<?php

namespace App\Http\Controllers\Box;

use App\Http\Controllers\Controller;
use App\Http\Requests\Box\CreateRequest;
use App\Http\Requests\Mypage\EditRequest;
use App\Models\Box;
use App\Models\BoxTag;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BoxController extends Controller
{
    public function new()
    {
        $user = Auth::user();
        $tags = $user->tags;
        return view('box.new')
            ->with([
                'user' => $user,
                'tags' => $tags,
            ]);
    }

    public function create(CreateRequest $request)
    {
        if ($request->has('box_img')) {
            $fileName = $this->saveBoxImg($request->file('box_img'));
        }

        $box = Box::create([
            'box_img' => $fileName ?? null,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'memo' => $request->input('memo'),
            'user_id' => $request->input('user_id'),
        ]);

        $box->tags()->attach($request->input('tag_ids'));        

        return redirect()->route('box.index')
            ->with('status', 'ボックスを登録しました');
    }

    public function editForm(Box $box)
    {
        $user = Auth::user();
        $tags = $user->tags;
        return view('box.edit_form')
            ->with([
                'box' => $box,
                'user' => $user,
                'tags' => $tags,
            ]);
    }

    public function index()
    {
        $user = Auth::user();
        $boxes = Box::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->get();
        return view('box.index')
            ->with('boxes', $boxes);
    }

    public function show(Box $box)
    {
        return view('box.show')
            ->with([
                'box' => $box,
                'user' => Auth::user(),
            ]);
    }

    public function edit(CreateRequest $request, Box $box)
    {
        if ($request->has('box_img')) {
            $fileName = $this->saveBoxImg($request->file('box_img'));
            if (!empty($box->box_img)) {
                Storage::disk('public')->delete('box_images/', $box->box_img);
            };
        }

        $box = Box::whereId($box->id)->update([
            'box_img' => $fileName ?? $box->box_img,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'memo' => $request->input('memo'),
            'user_id' => $request->input('user_id'),
        ]);

        $box->tags()->sync($request->input('tag_ids'));

        return redirect()->route('box.index')
            ->with('status', 'ボックス内容を変更しました'); 
    }

    private function saveBoxImg(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->fit(200,150)->save($tempPath);
        $filePath = Storage::disk('public')
            ->putFile('box_images', new File($tempPath));
        unlink($tempPath);

        return basename($filePath);
    }

    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }
}
