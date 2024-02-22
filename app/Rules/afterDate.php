<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class afterDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = date('d-m-Y', strtotime($value));
        $date = date('d-m-Y');

        if ($value < $date) {
            $fail(__("validation.after_date", ['attribute' => $attribute, 'date' => $date]));
        }
    }
}
