<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use App\Http\Controllers\Controller;

class PostTypeController extends Controller
{
      public function postTypeDropdown()
    {
        try {

            $postTypes = [
                [
                    'id' => 'blog',
                    'name' => 'Blog'
                ],
                [
                    'id' => 'news',
                    'name' => 'News'
                ],
                [
                    'id' => 'reels',
                    'name' => 'Reels'
                ],
                [
                    'id' => 'video',
                    'name' => 'Video'
                ],
            ];

            return response()->json([
                'status' => true,
                'message' => 'Post type dropdown fetched successfully',
                'data' => $postTypes
            ], 200);

        } catch (Throwable $e) {

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Create Post
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'post_type' => 'required|in:blog,news,reels,video',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $post  = PostType::create([
                'post_type' => $request->post_type,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Post created successfully',
                'data' => $post
            ], 201);

        } catch (Throwable $e) {

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}
