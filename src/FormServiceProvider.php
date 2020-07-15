<?php


namespace Adue;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/form.php', 'form');

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'adue-form'); 

        //$this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'form');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'form');

        Blade::component(Form::class, 'form');
        Blade::component(Field::class, 'field');
    }
}
