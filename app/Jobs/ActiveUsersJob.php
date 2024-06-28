<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActiveUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $users_ids;
    public function __construct($users_ids)
    {
        $this->users_ids=$users_ids;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users=$this->users_ids;

        //$user_ids=User::where('status',0)->pluck('id');

        foreach($users as $ids){
            User::where('id',$ids)->update([
                'status'=>0
            ]);
        }
    }
}
