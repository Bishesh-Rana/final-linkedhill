<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ChangeMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:migration {table}';

    /**
     * The console Remove the given table and remigrate it.
     *
     * @var string
     */
    protected $description = 'Remove the given table and remigrate it';

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
        $this->confirm("This will delete your data from  " . $this->argument('table') . " table. Are you sure to continue?");
        try {
            DB::table('migrations')->where('migration', 'like', '%_create_' . $this->argument('table') . '_table%')->delete();
            $this->info('Deleted the table');
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::statement("DROP TABLE IF EXISTS " . $this->argument('table'));
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            Artisan::call('migrate');
            $this->info('ALL  CLEAR :P');
            return true;
        } catch (\Throwable $th) {
            echo $this->error($th->getMessage());
        }
    }
}
