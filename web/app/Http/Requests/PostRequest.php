<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $currentUser = Auth::user();
        $requestUser = $this->user();

        if (is_null($currentUser) || !isset($currentUser->id)) {
            return false;
        }

        if (is_null($requestUser) || !isset($requestUser->id)) {
            return false;
        }

        return $currentUser->id === $requestUser->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        ];
    }
}
