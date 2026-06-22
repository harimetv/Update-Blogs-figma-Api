<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function getSocialLinks(Request $request)
    {
        try {

            $user = Auth::user();
            $socialLink = UserSocialLink::with('plateformType')->where('user_id', $user->id)->get();

            return response()->json([
                'success' => true,
                'message' => 'Social media link fetch successfully',
                'data' => $socialLink,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add social link: '.$e->getMessage(),
            ], 500);
        }
    }

    public function addSocialLink(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'plateform_type_id' => 'required|exists:social_media_categories,id',
                'plateform_link' => 'required|url|max:500',
                'plateform_id' => 'nullable|exists:user_social_links,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = Auth::user();

            if ($request->plateform_id) {
                $socialLink = UserSocialLink::with('plateformType')->where('id', $request->plateform_id)
                    ->where('user_id', $user->id)
                    ->first();

                if (! $socialLink) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Social media link not found',
                    ], 404);
                }

                if ($request->has('plateform_type_id')) {
                    $socialLink->plateform_type_id = $request->plateform_type_id;
                }
                if ($request->has('plateform_link')) {
                    $socialLink->plateform_link = $request->plateform_link;
                }
                $socialLink->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Social media link updated successfully',
                    'data' => $socialLink,
                ]);
            } else {
                if ($request->has('plateform_type_id')) {
                    $existing = UserSocialLink::where('user_id', $user->id)
                        ->where('plateform_type_id', $request->plateform_type_id)
                        ->exists();

                    if ($existing) {
                        return response()->json([
                            'success' => false,
                            'message' => 'You already have a link for this platform type.',
                        ], 409);
                    }
                }
            }

            $socialLink = UserSocialLink::create([
                'user_id' => $user->id,
                'plateform_type_id' => $request->plateform_type_id,
                'plateform_link' => $request->plateform_link,
            ]);

            $socialLink->load('plateformType');

            return response()->json([
                'success' => true,
                'message' => 'Social media link added successfully',
                'data' => $socialLink,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add social link: '.$e->getMessage(),
            ], 500);
        }
    }

    public function updateSocialLink(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:user_social_links,id',
                'plateform_type_id' => 'required|exists:social_media_categories,id',
                'platform_link' => 'required|url|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = Auth::user();
            $socialLink = UserSocialLink::with('plateformType')->where('id', $request->id)
                ->where('user_id', $user->id)
                ->first();

            if (! $socialLink) {
                return response()->json([
                    'success' => false,
                    'message' => 'Social media link not found',
                ], 404);
            }

            if ($request->has('plateform_type_id')) {
                $socialLink->plateform_type_id = $request->plateform_type_id;
            }
            if ($request->has('plateform_link')) {
                $socialLink->plateform_link = $request->plateform_link;
            }
            $socialLink->save();

            return response()->json([
                'success' => true,
                'message' => 'Social media link updated successfully',
                'data' => $socialLink,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update social link: '.$e->getMessage(),
            ], 500);
        }
    }

    public function deleteSocialLink(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:user_social_links,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = Auth::user();
            $socialLink = UserSocialLink::where('id', $request->id)
                ->where('user_id', $user->id)
                ->first();

            if (! $socialLink) {
                return response()->json([
                    'success' => false,
                    'message' => 'Social media link not found',
                ], 404);
            }

            $socialLink->delete();

            return response()->json([
                'success' => true,
                'message' => 'Social media link deleted successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete social link: '.$e->getMessage(),
            ], 500);
        }
    }
}
