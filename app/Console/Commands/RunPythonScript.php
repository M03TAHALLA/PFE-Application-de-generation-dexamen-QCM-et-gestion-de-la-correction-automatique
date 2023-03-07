<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunPythonScript extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'python:run {script}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a Python script';

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
        $script = $this->argument('script');
        $output = shell_exec("python $script");
        $this->info($output);
    }
}
?>