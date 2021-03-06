<?php

namespace App\Console;

use App\Classes\Schedule as ClassesSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    use ClassesSchedule;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\PopolateDatabase::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //delete login user one time at the month
        $schedule->call(function () {
            DB::table('userloggedlogs')->delete();
        })->monthly();

        $this->deleteMessageUnread($schedule);
        $this->deleteMessageRead($schedule);
        $this->deleteuserLoggedLog($schedule);


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
