<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--verified} {--name=} {--email=} {--pwd=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $name = $this->argument('name');
        $name = $this->option('name');
        $email = $this->option('email');
        $pwd = $this->option('pwd') ?? bcrypt('password');
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($pwd),
            'email_verified_at' => $this->option('verified') ? now() : null,
        ]);
        $this->info('User created successful. Username: ' . $name . '. Email: ' . $email . '. Password: ' . $pwd);
    }
}
