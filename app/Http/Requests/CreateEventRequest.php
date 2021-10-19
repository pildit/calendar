<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB, Log;

class CreateEventRequest extends FormRequest
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
            'title' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer|numeric',
            'user_id' => 'nullable|integer'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $this->user_id = $this->user_id ?? auth()->user()->id;
        \DB::connection()->enableQueryLog();

        $result = DB::table('events')
                    ->where('user_id', $this->user_id)
                    ->whereRaw('( ? BETWEEN start_date AND DATE_ADD(start_date, interval duration minute)', [$this->start_date])
                    ->orWhereRaw('start_date BETWEEN ? AND DATE_ADD(?, interval ? minute))', [$this->start_date, $this->start_date, $this->duration]);


        $validator->after(function ($validator) use ($result) {
            if ($result->exists()) {
                $validator->errors()->add('start_date', 'Two events can not overlap !');
            }
        });

        $queries = \DB::getQueryLog();
        Log::debug($queries);

    }
}
