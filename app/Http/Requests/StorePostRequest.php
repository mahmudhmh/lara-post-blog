<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title'=> ['required','min:3','unique:posts,title,'.$this->post],
                'description' => ['required','min:10'],
                'user_id' => ['required|exists:users,id'],
                'image' => ['mimes:jpeg,png']
            ];

    }

    public function messages(): array
    {
        return [
            'title' => [
                'required' => 'A Title is Required',
                'unique' => 'Title is must be Unique',
                'min' => 'A Title must be larger than 3 Characters'
            ],
            'description' => [
                'required' => 'A Description is Required',
                'min' => 'A Description must be larger than 10 Characters'
            ],
            'image' => [
                'mimes' => 'An Image Must be jpeg or png Only'
            ]
        ];
    }
}
