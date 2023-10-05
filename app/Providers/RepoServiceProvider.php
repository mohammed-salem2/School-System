<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repository\Teacher\TeacherInterface',
            'App\Repository\Teacher\TeacherRepository',
        );

        $this->app->bind(
            'App\Repository\Student\StudentInterface',
            'App\Repository\Student\StudentRepository',
        );

        $this->app->bind(
            'App\Repository\Promotion\PromotionInterface',
            'App\Repository\Promotion\PromotionRepository',
        );

        $this->app->bind(
            'App\Repository\Fee\FeeInterface',
            'App\Repository\Fee\FeeRepository',
        );

        $this->app->bind(
            'App\Repository\Invoice\InvoiceInterface',
            'App\Repository\Invoice\InvoiceRepository',
        );

        $this->app->bind(
            'App\Repository\Discount\DiscountInterface',
            'App\Repository\Discount\DiscountRepository',
        );

        $this->app->bind(
            'App\Repository\Receipt\ReceiptInterface',
            'App\Repository\Receipt\ReceiptRepository',
        );

        $this->app->bind(
            'App\Repository\ProcessFee\ProcessFeeInterface',
            'App\Repository\ProcessFee\ProcessFeeRepository',
        );

        $this->app->bind(
            'App\Repository\Payment\PaymentInterface',
            'App\Repository\Payment\PaymentRepository',
        );

        $this->app->bind(
            'App\Repository\Attendance\AttendanceInterface',
            'App\Repository\Attendance\AttendanceRepository',
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
