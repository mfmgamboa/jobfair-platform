namespace App\View\Components;

use Illuminate\View\Component;

class AuthValidationErrors extends Component
{
    public $errors;

    public function __construct($errors = null)
    {
        $this->errors = $errors;
    }

    public function render()
    {
        return view('components.auth-validation-errors');
    }
}