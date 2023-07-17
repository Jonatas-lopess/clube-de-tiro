<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\TemporaryFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteTmpFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-tmpfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting temporary files from database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tmps = TemporaryFile::where('created_at', '<=', Carbon::now()->subHour())->get();
        foreach ($tmps as $tmp) {
            File::delete(public_path('images/tmp/'.$tmp->filename));
            $tmp->delete();
        }
    }
}
