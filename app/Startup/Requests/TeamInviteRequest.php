<?php

namespace Startup\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamInviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) {
                if (request()->account()->invites()->whereEmail($value)->first()) {
                    return $fail($value . ' is already invited.');
                }
            },
                function ($attribute, $value, $fail) {
                    if (request()->account()->members()->whereEmail($value)->first()) {
                        return $fail($value . ' is already a member of this account.');
                    }
                }],
            'role' => 'required',
        ];
    }

}
