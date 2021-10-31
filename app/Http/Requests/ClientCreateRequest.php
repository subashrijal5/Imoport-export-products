<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required|in:male,female,others',
            'prefered_contact_mode' => 'required|in:phone,email,none',
            'address' => 'required',
            'nationality' => 'required',
            'phone' => 'required|digits:10',
            'date_of_birth' => 'nullable|date_format:Y-m-d|before:2005-01-01',
        ];
    }
}
