<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\PostCategory;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{


public function index()
    {
        try {

            $blogs = Blog::with([
                'category',
                'tags',
                'images'
            ])
            ->latest()
            ->get();

            return response()->json([
                'status' => true,
                'message' => 'Blogs fetched successfully',
                'data' => $blogs
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Failed to fetch blogs',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Create Blog
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        try {

            $request->validate([

                'title' => 'required|string|max:255',

                'description' => 'required|string',

                'author_name' => 'required|string|max:255',

                'category_id' => 'required|exists:categories,id',

                'tags' => 'nullable|array',

                'tags.*' => [
                    'exists:tags,id'
                ],

                'featured_image' => [
                    'required',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048'
                ],

                'additional_images' => 'nullable|array',

                'additional_images.*' => [
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048'
                ],

                'meta_title' => 'nullable|string|max:255',

                'meta_description' => 'nullable|string',

                'slug' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:blogs,slug'
                ],

                'publish_date' => 'nullable|date',

                'status' => 'required|in:draft,published',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Blog
            |--------------------------------------------------------------------------
            */

            $blog = Blog::create([

                'title' => $request->title,

                'description' => $request->description,

                'author_name' => $request->author_name,

                'category_id' => $request->category_id,

                'meta_title' => $request->meta_title,

                'meta_description' => $request->meta_description,

                'slug' => $request->slug,

                'publish_date' => $request->publish_date,

                'status' => $request->status,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Attach Tags
            |--------------------------------------------------------------------------
            */

            if ($request->has('tags')) {

                $blog->tags()->sync(
                    $request->tags
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Featured Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('featured_image')) {

                $path = $request->file('featured_image')
                    ->store('blogs', 'public');

                $blog->images()->create([

                    'image_path' => $path,

                    'type' => 'featured'
                ]);
            }


            if ($request->hasFile('additional_images')) {

                foreach (
                    $request->file('additional_images')
                    as $image
                ) {

                    $path = $image->store(
                        'blogs',
                        'public'
                    );

                    $blog->images()->create([

                        'image_path' => $path,

                        'type' => 'additional'
                    ]);
                }
            }


            return response()->json([

                'status' => true,

                'message' => 'Blog created successfully',

                'data' => $blog->load([
                    'category',
                    'tags',
                    'images'
                ])

            ], 201);


        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([

                'status' => false,

                'message' => 'Validation failed',

                'errors' => $e->errors()

            ], 422);


        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' => 'Failed to create blog',

                'error' => $e->getMessage()

            ], 500);
        }


    }

     public function categoryDropdown()
{

    $categories = Category::select('id', 'name')
        ->orderBy('name')
        ->get();

    return response()->json([
        'status' => true,
        'message' => 'Category dropdown fetched successfully.',
        'data' => $categories
    ], 200);
}


 // =====================================================
    // SHOW BLOG
    // =====================================================

    public function show($id)
    {
        try {

            $blog = Blog::with([
                'category',
                'tags',
                'images'
            ])->findOrFail($id);

            return response()->json([

                'status' => true,

                'message' =>
                    'Blog fetched successfully',

                'data' =>
                    $blog

            ], 200);


        } catch (ModelNotFoundException $e) {

            return response()->json([

                'status' => false,

                'message' =>
                    'Blog not found'

            ], 404);


        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' =>
                    'Failed to fetch blog',

                'error' =>
                    $e->getMessage()

            ], 500);
        }
    }


    // =====================================================
    // UPDATE BLOG
    // =====================================================

    public function update(Request $request, $id)
    {
        try {

            $blog = Blog::findOrFail($id);

            $request->validate([

                'title' =>
                    'required|string|max:255',

                'description' =>
                    'required|string',

                'author_name' =>
                    'required|string|max:255',

                'category_id' =>
    'required|exists:categories,id',

                'tags' =>
                    'nullable|array',

                'tags.*' =>
                    'exists:tags,id',

                'featured_image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048'
                ],

                'additional_images' =>
                    'nullable|array',

                'additional_images.*' => [
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048'
                ],

                'meta_title' =>
                    'nullable|string|max:255',

                'meta_description' =>
                    'nullable|string',

                'slug' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:blogs,slug,' . $id
                ],

                'publish_date' =>
                    'nullable|date',

                'status' =>
                    'required|in:draft,published',
            ]);


            // Update Blog

            $blog->update([

                'title' =>
                    $request->title,

                'description' =>
                    $request->description,

                'author_name' =>
                    $request->author_name,

                'category_id' =>
                    $request->category_id,

                'meta_title' =>
                    $request->meta_title,

                'meta_description' =>
                    $request->meta_description,

                'slug' =>
                    $request->slug,

                'publish_date' =>
                    $request->publish_date,

                'status' =>
                    $request->status,
            ]);


            // Update Tags

            if ($request->has('tags')) {

                $blog->tags()->sync(
                    $request->tags ?? []
                );
            }


            // Replace Featured Image

            if ($request->hasFile('featured_image')) {

                $oldImage = $blog->images()
                    ->where('type', 'featured')
                    ->first();

                if ($oldImage) {

                    Storage::disk('public')
                        ->delete(
                            $oldImage->image_path
                        );

                    $oldImage->delete();
                }


                $path = $request
                    ->file('featured_image')
                    ->store('blogs', 'public');


                $blog->images()->create([

                    'image_path' => $path,

                    'type' => 'featured'
                ]);
            }


            // Add Additional Images

            if ($request->hasFile('additional_images')) {

                foreach (
                    $request->file('additional_images')
                    as $image
                ) {

                    $path = $image->store(
                        'blogs',
                        'public'
                    );

                    $blog->images()->create([

                        'image_path' =>
                            $path,

                        'type' =>
                            'additional'
                    ]);
                }
            }


            return response()->json([

                'status' => true,

                'message' =>
                    'Blog updated successfully',

                'data' =>
                    $blog->load([
                        'category',
                        'tags',
                        'images'
                    ])

            ], 200);


        } catch (ValidationException $e) {

            return response()->json([

                'status' => false,

                'message' =>
                    'Validation failed',

                'errors' =>
                    $e->errors()

            ], 422);


        } catch (ModelNotFoundException $e) {

            return response()->json([

                'status' => false,

                'message' =>
                    'Blog not found'

            ], 404);


        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' =>
                    'Failed to update blog',

                'error' =>
                    $e->getMessage()

            ], 500);
        }
    }


 public function destroy($id)
{
    try {

        $blog = Blog::with('images')
            ->findOrFail($id);


        // Delete physical images

        foreach ($blog->images as $image) {

            Storage::disk('public')
                ->delete($image->image_path);
        }


        // Delete tags

        $blog->tags()->detach();


        // Delete blog

        $blog->delete();


        return response()->json([

            'status' => true,

            'message' => 'Blog deleted successfully'

        ], 200);


    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

        return response()->json([

            'status' => false,

            'message' => 'Blog not found'

        ], 404);


    } catch (\Exception $e) {

        return response()->json([

            'status' => false,

            'message' => 'Failed to delete blog',

            'error' => $e->getMessage()

        ], 500);
    }
}


public function postCategory()
{
    try {

        $posts = Blog::select(
            'id',
            'title'
        )
        ->where('status', 'published')
        ->orderBy('title')
        ->get();


        return response()->json([

            'status' => true,

            'message' => 'Post category fetched successfully',

            'data' => $posts

        ], 200);


    } catch (\Exception $e) {

        return response()->json([

            'status' => false,

            'message' => 'Failed to fetch post dropdown',

            'error' => $e->getMessage()

        ], 500);
    }
}


    public function tagDropdown()
{
    try {

        $tags = Tag::select(
            'id',
            'name'
        )
        ->orderBy('name')
        ->get();


        return response()->json([

            'status' => true,

            'message' => 'Tags dropdown fetched successfully',

            'data' => $tags

        ], 200);


    } catch (\Exception $e) {

        return response()->json([

            'status' => false,

            'message' => 'Failed to fetch tags',

            'error' => $e->getMessage()

        ], 500);
    }
}

}
