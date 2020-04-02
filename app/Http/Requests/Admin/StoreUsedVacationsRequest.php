<?php
namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsedVacationsRequest extends FormRequest
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
            'vacation_id' => 'required',
            'starts_at' => 'required|date_format:'.config('app.date_format'),
            'ends_at' => [
                'required',
                'date_format:'.config('app.date_format'),
                function($attr, $val, $fail) {
                    if(Carbon::parse(request('starts_at'))->diffInDays(request('ends_at'), false) + 1 <= 0) {
                        $fail('تاريخ الانتهاء يجب ان يكون أكبر من تاريخ البدأ');
                    }
                },
            ],
        ];
    }
}
