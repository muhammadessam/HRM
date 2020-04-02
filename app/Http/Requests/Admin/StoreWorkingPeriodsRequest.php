<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkingPeriodsRequest extends FormRequest
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
            'starts_at' => 'required|date_format:'.config('app.date_format'),
            'finishes_at' => 'required|date_format:'.config('app.date_format'),
            'starts_at_time' => 'required|date_format:H:i:s',
            'finishes_at_time' => 'required|date_format:H:i:s',
            'when_no_in_time' => 'required|date_format:H:i:s',
            'when_no_out_time' => 'required|date_format:H:i:s',
            'hours_needed' => 'required|date_format:H:i:s',
        ];
    }
}