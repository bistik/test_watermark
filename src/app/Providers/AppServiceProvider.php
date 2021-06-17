<?php

namespace App\Providers;

use App\Http\Service\AddWatermarkInterface;
use App\Http\Service\AddWatermarkService;
use App\Http\Service\ConverterInterface;
use App\Http\Service\ImageListInterface;
use App\Http\Service\ImageListService;
use App\Http\Service\PdfToImageConverter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ConverterInterface::class, PdfToImageConverter::class);
        $this->app->singleton(ImageListInterface::class, ImageListService::class);
        $this->app->singleton(AddWatermarkInterface::class, AddWatermarkService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
