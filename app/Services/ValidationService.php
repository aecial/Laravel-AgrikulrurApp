<?php 
// app/Services/ValidationService.php

namespace App\Services;

use Illuminate\Validation\Factory as Validator;
use App\Models\messages;

class ValidationService
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateMessage(array $data)
    {
        return $this->validator->make($data, [
            'message' => 'required|integer|unique:messages',
        ])->validate();

        if ($this->validator->fails()) {
            return response()->json(['errors' => $this->validator->errors()], 422);
        }
    }
}


/*namespace App\Services;

use Illuminate\Validation\Factory as Validator;

class ValidationService
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateMessage(array $data)
    {
        return $this->validator->make($data, [
            'message' => 'required|string|max:255',
        ])->validate();
    }
}*/
