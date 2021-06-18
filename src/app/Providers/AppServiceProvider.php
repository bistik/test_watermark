<?php

namespace App\Providers;

use App\Http\Service\AddWatermarkInterface;
use App\Http\Service\RectangleWatermarkService;
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
        $this->app->singleton(AddWatermarkInterface::class, function ($app) {
            return new RectangleWatermarkService(
                config('app.watermark_width'),
                config('app.watermark_height'),
                config('app.watermark_color')
            );
        });
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
