<?php

namespace App\Http\Controllers;

use App\Post;
use App\Support\Croppper;
use App\Tag;
use App\TagPost;
use App\User;
use Illuminate\Http\Request;
use \App\Http\Requests\Post as PostRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{

    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        $tags = Tag::all();
        $users = User::all();


        return view('posts.create', [
            'tags' => $tags,
            'users' => $users
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function salvar(PostRequest $request)
    {
        $tags = (isset($request->tags) && is_array($request->tags) ? $request->tags : null);
        unset($request->tags, $request['tags']);

        $post = Post::create($request->all());

        if (!empty($request->file('cover'))) {
            $post->cover = $request->file('cover')->store('post');
            $post->save();
        }

        if (!is_null($tags)) {
            foreach ($tags as $tagID) {
                TagPost::create(['tag_id' => $tagID, 'post_id' => $post->id]);
            }
        }
        return redirect()->route('posts')->with(['color' => 'success', 'message' => "Post criado com sucesso!"]);
    }

    public function apresentar($id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'users' => $users
        ]);
    }


    /**
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function atualizar(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if (!empty($request->file('cover'))) {
            Storage::delete($post->cover);
            Croppper::flush($post->cover);

            $post->cover = '';
        }

        $tags = (isset($request->tags) && is_array($request->tags) ? $request->tags : null);
        unset($request->tags, $request['tags']);

        $post->fill($request->all());

        if ((!empty($request->file('cover')))) {
            $post->cover = $request->file('cover')->store('post');
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        TagPost::where('post_id', $post->id)->delete();

        if ($tags && is_array($tags)) {
            foreach ($tags as $tagID) {
                TagPost::create(['tag_id' => $tagID, 'post_id' => $post->id]);
            }
        }

        return redirect()->route('posts')->with(['color' => 'success', 'message' => "Post atualizado com sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        Post::where('id', $id)->delete();

        TagPost::where('tag_post', $id)->delete();

        return redirect()->route('posts')->with(['color' => 'success', 'message' => "Post removido com sucesso!"]);
    }
}
