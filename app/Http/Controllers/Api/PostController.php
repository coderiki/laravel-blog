<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostsResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostService $postService)
    {
        $posts = $postService->getPaginated('posts');

        return new PostsResource($posts);
    }

    /**
     * Store a newly created resource in storost.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, PostService $postService, Request $request)
    {
		$id = (int)$id;
		if ($id==0) {
			abort(400);
		}

		$include = $postService->includeRelatedResources($request->input('include'));

        $post = $postService->getByParam(['id' => $id], $include['with'] ?? []);

		if (empty($post)){
			abort(404);
		}

        PostResource::withoutWrapping();

        return new PostResource($post, $include['relatedResources'] ?? []);
    }

    /**
     * Update the specified resource in storost.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
