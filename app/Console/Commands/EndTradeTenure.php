<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Illuminate\Console\Command;

class EndTradeTenure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:end-tenure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Marks plans with expired trade tenures as inactive.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start_time = now();
        Subscription::with('user')->active()->expired()->chunk(50, function ($subscriptions) {

            $subscriptions->map(function ($subscription, $key) {

                $user = $subscription->user;

                $this->line('closing active trades');

                $user->trades()
                    ->active()->get()
                    ->flatMap->close();

                $this->info('closed active trades');

                $this->newLine(2);

                $this->line('settling accounts');

                $invested_amount = $user->accounts()
                    ->where('type', 'invested')
                    ->first()?->account ?? 0;

                $user->accounts()
                    ->where('type', 'main')
                    ->increment('account', $invested_amount);

                $user->accounts()
                    ->where('type', 'invested')
                    ->decrement('account', $invested_amount);

                $this->newLine(2);


                $subscription->update([
                    'status' => 'inactive'
                ]);
                $this->info('settled accounts');

                $this->newLine(2);
            });
        });
        $end_time = now();

        $this->info("Ended expired trade tenures in {$end_time->diffInMilliseconds($start_time)} ms");
    }
}
