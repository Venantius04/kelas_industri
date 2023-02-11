<?php

namespace App\Console\Commands;

use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Console\Command;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating 10 user with faker';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::factory(10)->create();
        return Command::SUCCESS;
    }
}
