<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostType;
use App\Models\post_titles;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function postTitleDropdown()
    {
        try {

            $postTitles = Post_titles::select(
                'id',
                'title'
            )->get();

            return response()->json([
                'status' => true,
                'message' => 'Post title dropdown fetched successfully',
                'data' => $postTitles
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
{
try {

    $validator = Validator::make($request->all(), [

        'post_type_id' => ['required','exists:post_types,id'],

        'post_title_id' => ['required','exists:post_titles,id' ],

        'post_description' => ['required', 'string'],

        'media' => ['required','file' ],
    ]);

    if ($validator->fails()) {

        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    $postType = PostType::find($request->post_type_id);

    if (!$postType) {

        return response()->json([
            'status' => false,
            'message' => 'Post type not found'
        ], 404);
    }


    $mediaValidator = Validator::make($request->all(), [

        'media' => [
            'required',
            'file',
            'mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv,webm',
            'max:20480'
        ]

    ]);


    if ($mediaValidator->fails()) {

        return response()->json([
            'status' => false,
            'message' => 'Invalid media file',
            'errors' => $mediaValidator->errors()
        ], 422);
    }

    $mediaPath = $request->file('media')
        ->store('posts', 'public');


    $post = Post::create([

        'post_type_id' => $request->post_type_id,

        'post_title_id' => $request->post_title_id,

        'post_description' => $request->post_description,

        'media' => $mediaPath,

    ]);


    return response()->json([
        'status' => true,
        'message' => 'Post created successfully',
        'data' => $post
    ], 201);


} catch (\Exception $e) {

    return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
        'error' => $e->getMessage()
    ], 500);
}

}

public function update(Request $request, $id)
{
try {

    $post = Post::find($id);

    if (!$post) {

        return response()->json([
            'status' => false,
            'message' => 'Post not found'
        ], 404);
    }



    $validator = Validator::make($request->all(), [

        'post_type_id' => [
            'required',
            'exists:post_types,id'
        ],

        'post_title_id' => [
            'required',
            'exists:post_titles,id'
        ],

        'post_description' => [
            'required',
            'string'
        ],

        'media' => [
            'nullable',
            'file'
        ],

    ]);


    if ($validator->fails()) {

        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }



    $postType = PostType::find($request->post_type_id);

    if (!$postType) {

        return response()->json([
            'status' => false,
            'message' => 'Post type not found'
        ], 404);
    }



    $post->post_type_id = $request->post_type_id;

    $post->post_title_id = $request->post_title_id;

    $post->post_description = $request->post_description;



    if ($request->hasFile('media')) {

        $mediaValidator = Validator::make($request->all(), [

            'media' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv,webm',
                'max:20480'
            ]

        ]);


        if ($mediaValidator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid media file',
                'errors' => $mediaValidator->errors()
            ], 422);
        }


        // Delete old media
        if ($post->media) {

            $oldMediaPath = storage_path(
                'app/public/' . $post->media
            );

            if (file_exists($oldMediaPath)) {
                unlink($oldMediaPath);
            }
        }


        // Store new media
        $mediaPath = $request->file('media')
            ->store('posts', 'public');

        $post->media = $mediaPath;
    }


    $post->save();


    return response()->json([
        'status' => true,
        'message' => 'Post updated successfully',
        'data' => $post
    ], 200);


} catch (\Exception $e) {

    return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
        'error' => $e->getMessage()
    ], 500);
}

}


public function destroy($id)
{
try {

    $post = Post::find($id);

    if (!$post) {

        return response()->json([
            'status' => false,
            'message' => 'Post not found'
        ], 404);
    }



    if ($post->media) {

        $mediaPath = storage_path(
            'app/public/' . $post->media
        );

        if (file_exists($mediaPath)) {
            unlink($mediaPath);
        }
    }



    $post->delete();


    return response()->json([
        'status' => true,
        'message' => 'Post deleted successfully'
    ], 200);


} catch (\Exception $e) {

    return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
        'error' => $e->getMessage()
    ], 500);
}

}

}




