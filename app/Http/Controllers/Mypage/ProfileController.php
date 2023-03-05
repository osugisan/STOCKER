<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mypage\EditRequest;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function editForm()
    {
        return view('mypage.edit_form')
            ->with('user', Auth::user());
    }

    public function edit(EditRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');

        if ($request->has('avatar_img')) {
            $fileName = $this->saveAvatar($request->file('avatar_img'));
            $user->avatar_img = $fileName;
        };

        $user->save();

        // User::where('id', '$user_id')->update([
        //     'name' => $request->input('name'),
        //     // 'avatar_img' => $fileName,
        // ]);

        return redirect()->back()
            ->with('status', 'プロフィールを変更しました');
    }

    private function saveAvatar(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->fit(150, 150)->save($tempPath);
        $filePath = Storage::disk('public')
            ->putFile('avatars', new File($tempPath));
        
        return basename($filePath);
    }

    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }
}