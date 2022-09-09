<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateUserCountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:count {--count=} {--verified}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user by count';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->option('count');

        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for ($i = 1; $i <= $count; $i++) {
            $name = Str::random(8);
            $email = $name . '@gmail.com';
            $pwd = Str::random(8);
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($pwd),
                'email_verified_at' => $this->option('verified') ? now() : null,
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info(' Created ' . $count . ' user successful !');
    }
}
