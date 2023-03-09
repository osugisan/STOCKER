<?php

namespace App\Http\Controllers\Box;

use App\Http\Controllers\Controller;
use App\Http\Requests\Box\CreateRequest;
use App\Models\Box;
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
        return view('box.new')
            ->with('user', Auth::user());
    }

    public function create(CreateRequest $request)
    {
        if ($request->has('box_img')) {
            $fileName = $this->saveBoxImg($request->file('box_img'));
        }

        Box::create([
            'box_img' => $fileName ?? null,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'memo' => $request->input('memo'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->back()
            ->with('status', '登録成功');
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
