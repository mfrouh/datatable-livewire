<?php

namespace MFrouh\DataTable\Providers;

use Illuminate\Support\ServiceProvider;
use MFrouh\DataTable\Console\MakeDataTableCommand;

class LivewireDatatableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'datatables');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang/', 'langDatatables');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeDataTableCommand::class,
            ]);
          }
    }
}
