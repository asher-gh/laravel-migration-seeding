<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class AddMovieToCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // this is good usecase for authorize method
        // only authorize users to modify their own collections
        return $this->route('collection')->user->is($this->user());

        // The following approach is okay, but the above one showcases a unique ]
        // behaviour of requests from authenticated users
        // $collection = $this->route('collection');
        //
        // return $collection->user_id === Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'movie_id' => ['required', 'exists:movies,id'],
        ];
    }
}
