<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetAdminCommand extends Command
{
    protected $signature = 'admin:reset {email=admin@navexmar.com} {password=password123}';
    protected $description = 'Create or reset the admin user account';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'NAVEX Admin',
                'password' => Hash::make($password),
            ]
        );

        $this->info("Admin hesabı başarıyla güncellendi/oluşturuldu!");
        $this->line("E-posta: <comment>{$email}</comment>");
        $this->line("Şifre:   <comment>{$password}</comment>");

        return 0;
    }
}
