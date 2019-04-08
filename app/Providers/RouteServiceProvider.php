<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $webnamespace = 'App\Http\Controllers\WWW';

    protected $apinamespace = 'App\Http\Controllers\API';

    protected $adminnamespace = 'App\Http\Controllers\Admin';

    protected $soapnamespace = 'App\Http\Controllers\SOAP';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        if(isset($_SERVER['HTTP_HOST'])) {
            $url_prefix = explode('.',$_SERVER['HTTP_HOST'])[0];
            if($url_prefix=='www'){
                $this->mapWebRoutes();
            }else if($url_prefix=='admin'){
                $this->mapAadminRoutes();
            }else{
                $this->mapApiRoutes();
            }
        }else{
            $this->mapWebRoutes();
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
       /* Route::namespace($this->webnamespace)
             ->group(base_path('routes/web.php'));*/
       Route::middleware('web')
           ->namespace($this->webnamespace)
           ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->apinamespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAadminRoutes()
    {
        Route::namespace($this->adminnamespace)
            ->group(base_path('routes/admin.php'));
    }

}
