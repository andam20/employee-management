<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class ClearLogFiles extends Command
{
    protected $signature = 'logs:clear';
    protected $description = 'Clear all log files';

    public function handle()
    {
        $files = File::files(storage_path('logs'));
        foreach ($files as $file) {
            File::delete($file);
        }
        $this->info('All log files have been deleted successfully!');
    }
}
