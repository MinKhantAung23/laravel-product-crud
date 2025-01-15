<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'title' => 'required |string|max:255',
      'description' => 'nullable|string|max:1000',
      'price' => 'required|numeric',
      'category_id' => 'required|numeric',
      'stock' => 'required|numeric',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
  }
}
