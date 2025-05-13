<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MakeSuperUser extends Command
{
    protected $signature = 'make:superuser';
    protected $description = 'Create a new Super User (Admin)';

    public function handle()
{
    $name = $this->ask('Full Name');
    $email = $this->ask('Email');
    $password = $this->secret('Password');

    if (Admin::where('email', $email)->exists()) {
        $this->error('An admin with this email already exists!');
        return 1;
    }

    Admin::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'photo' => 'defaultadminpicture.png',
        'token' => Str::random(64),
    ]);

    $this->info('Super Admin created successfully!');
    return 0;
}

}
