namespace App\Services;

use Illuminate\Validation\Factory as Validator;

class ValidationService
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateWebSocketData(array $data)
    {
        return $this->validator->make($data, [
            'message' => 'required|string|max:255',
        ])->validate();
    }
}
