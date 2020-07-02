<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\Cleanings;
use Excel;

class ImportCleanings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:eol-cleanings {type} {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $type = trim($this->arguments()['type']);
        $filename = trim($this->arguments()['filename']);
        Excel::import(new Cleanings($type), public_path() . '/imports/' . $filename);
    }
}
