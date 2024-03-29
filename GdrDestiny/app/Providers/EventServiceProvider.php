<?php

namespace App\Providers;

use App\Events\BuyingObjects;
use App\Events\ChangeMap;
use App\Events\UpdateDataUserPt1;
use App\Events\ChangeUser;
use App\Events\CheckCureUser;
use App\Events\Logged;
use App\Events\ShowLog;
use App\Events\showMessages;
use App\Listeners\ChangeLastActivity;
use App\Listeners\ConvertForeignToValue;
use App\Listeners\DeleteHurts;
use App\Listeners\SendUpdataDataToCheckAndToDb;
use App\Listeners\DeletingInfo;
use App\Listeners\RegisterLogging;
use App\Listeners\TakingMoneyFromUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UpdateDataUserPt1::class => [
            SendUpdataDataToCheckAndToDb::class
        ],
        ChangeUser::class => [
            DeletingInfo::class
        ],
        BuyingObjects::class =>[
            TakingMoneyFromUser::class            
        ],
        ShowLog::class =>[
            ConvertForeignToValue::class
        ],
        showMessages::class => [
            ConvertForeignToValue::class
        ],
        ChangeMap::class => [
            ChangeLastActivity::class
        ],
        CheckCureUser::class => [
            DeleteHurts::class
        ],
      
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
