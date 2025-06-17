<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Application console kernel.
 *
 * This class is responsible for registering Artisan commands and defining
 * scheduled tasks that should run at certain intervals.
 */
class Kernel extends ConsoleKernel
{
    /**
     * Register the application's command schedule.
     *
     * @param  Schedule  $schedule  The scheduler instance provided by Laravel.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Add scheduled commands here, e.g. $schedule->command('inspire')->hourly();
    }

    /**
     * Register the console commands for the application.
     */
    protected function commands(): void
    {
        // Load all command classes from the Commands directory.
        $this->load(__DIR__.'/Commands');
    }
}
