<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeleteLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   
     
    protected $signature = 'logs:delete';
    protected $description = 'Delete logs older than 1 month';

    public function handle()
    {
        $monthAgo = Carbon::now()->subMonth();
        DB::table('logs')->where('created_at', '<', $monthAgo)->delete();
        $this->info('Logs older than 1 month have been deleted');
    }
}
