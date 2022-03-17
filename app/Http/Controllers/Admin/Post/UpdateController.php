<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        //берем изображение кладем ее в сторадж и переопределяем путь к изображению /https://youtu.be/oCwP0PsHmUk?t=507
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $post->update($data);
        $post->tags()->sync($tagIds);
        return redirect()->route('admin.post.show', compact('post'));
    }
}
