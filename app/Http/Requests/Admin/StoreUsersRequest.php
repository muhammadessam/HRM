<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'matriculate' => 'required|unique:users,matriculate,'.$this->route('user'),
            'sex' => 'required',
            'salary' => 'numeric|required',
            'hire_date' => 'required|date_format:'.config('app.date_format'),
            'phone'=>'required',
            'address'=>'required',
            'birth_date_m' => 'nullable|date_format:'.config('app.date_format'),
            'situation' => 'required',
            'nationality' => 'required',
            'hire_end' => 'required|date_format:'.config('app.date_format'),
            'end_reason' => 'required',
            'degree_id' => 'required',
            'department_id' => 'required',
            'specialty_id' => 'required',
            'role_id' => 'required',
            'identity_number' => 'required|unique:users,identity_number,'.$this->route('user'),
        ];
    }
}
