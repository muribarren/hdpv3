<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'mikel.uribarren@hettich.com'],
            [
                'name' => 'Mikel Uribarren',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'enaut.arrieta@hettich.com'],
            [
                'name' => 'Enaut Arriaga',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'iker.lopetegi@hettich.com'],
            [
                'name' => 'Iker Lopetegi',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'maitane.ajuria@hettich.com'],
            [
                'name' => 'Maitane Ajuria',
                'password' => bcrypt('password'),
            ]
        );

        // Agrega más usuarios si quieres
    }
}