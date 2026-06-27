<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFavoriteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'person'              => 'required|in:public,private,onlyme',
            'favorite_food'           => 'nullable|string|max:255',
            'favorite_books'          => 'nullable|string|max:255',
            'favorite_music'          => 'nullable|string|max:255',
            'favorite_sports'         => 'nullable|string|max:255',
            'favorite_movies'         => 'nullable|string|max:255',
            'favorite_tv_shows'       => 'nullable|string|max:255',
            'favorite_vacation_place' => 'nullable|string|max:255',
            'favorite_actor_actress'  => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'visibility.required'            => 'Visibility is required.',
            'visibility.in'                  => 'Invalid visibility option selected.',

            'favorite_food.string'           => 'Favorite food must be a valid text.',
            'favorite_books.string'          => 'Favorite books must be a valid text.',
            'favorite_music.string'          => 'Favorite music must be a valid text.',
            'favorite_sports.string'         => 'Favorite sports must be a valid text.',
            'favorite_movies.string'         => 'Favorite movies must be a valid text.',
            'favorite_tv_shows.string'       => 'Favorite TV shows must be a valid text.',
            'favorite_vacation_place.string' => 'Favorite vacation place must be a valid text.',
            'favorite_actor_actress.string'  => 'Favorite actor/actress must be a valid text.',
        ];
    }
}
