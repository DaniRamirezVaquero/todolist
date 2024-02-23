<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;
class afterDate implements ValidationRule
{
  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $value = Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
    $date = Carbon::now()->startOfDay();

    if ($value < $date) {
      $fail(__("validation.after_date", ['attribute' => $attribute, 'date' => $date->format('d-m-Y')]));
    }
  }
}

