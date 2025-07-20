namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot()
    {
        // Register Blade components
	Blade::component('auth-validation-errors', AuthValidationErrors::class);
        Blade::component('auth-validation-errors', \Illuminate\View\Component::class);
        Blade::component('auth-session-status', \Illuminate\View\Component::class);
        Blade::component('auth-card', \Illuminate\View\Component::class);
    }
}