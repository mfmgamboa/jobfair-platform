namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GovernmentDashboardController extends Controller
{
    public function index()
    {
        return view('government.dashboard');
    }
}
