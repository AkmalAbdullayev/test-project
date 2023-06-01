<?php

namespace App\Http\Controllers;

use App\Actions\Posts\StoreAction;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::query()->get();

        return view('index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PostRequest $request,
//        StoreAction $storeAction,
    ): RedirectResponse
    {
        // or we can implement store logic using Actions, also created Action Class for storing post
        // we can use our Action Class using dependency injection while writing out StoreAction as method parameter

        Post::query()->create($request->validated());

//         $storeAction->handle($request->validated());

        return redirect()->route('posts.index')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return \view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('posts.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->delete()) {
            return redirect()->route('posts.index')->with('success');
        }

        return redirect()->route('posts.index')->with('error');
    }
}
