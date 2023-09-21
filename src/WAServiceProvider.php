<?php
namespace WAIntegration;
use Illuminate\Support\ServiceProvider;

class WAServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->publishes([
            __DIR__ . '/../config/wa_integration.php' => config_path('wa_integration.php'),
            __DIR__ . '/../routes/wa_integration.php' => base_path('/routes/wa_integration.php')
        ]);
    }

    public function register(){
        $this->app->singleton(WAconnection::class,function (){
            return new WAconnection(config('wa_integration'));
        });
    }
}
