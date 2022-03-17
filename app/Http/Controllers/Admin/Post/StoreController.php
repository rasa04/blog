<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try
        {
            $data = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            //берем изображение кладем ее в сторадж и переопределяем путь к изображению
            //https://youtu.be/oCwP0PsHmUk?t=507
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        }
        catch(\Exception $exception)
        {
            abort(404);
        }
        return redirect()->route('admin.post.index');
    }
}
