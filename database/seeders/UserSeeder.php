<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'enaut.arriaga@hettich.com'],
            [
                'name' => 'Enaut Arriaga',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'iker.lopetegi@hettich.com'],
            [
                'name' => 'Iker Lopetegi',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'maitane.ajuria@hettich.com'],
            [
                'name' => 'Maitane Ajuria',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'mikel.uribarren@hettich.com'],
            [
                'name' => 'Mikel Uribarren',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'aitor.pizarro@hettich.com'],
            [
                'name' => 'Aitor Pizarro',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'ignacio.angulo@hettich.com'],
            [
                'name' => 'Ignacio Angulo',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'jon.lesaka@hettich.com'],
            [
                'name' => 'Jon Lesaka',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'michel.saez.de.ojer@hettich.com'],
            [
                'name' => 'Miche Saez de Ojer',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'raul.lorenzo@hettich.com'],
            [
                'name' => 'Raul Lorenzo',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'alfonso.mitxelena@hettich.com'],
            [
                'name' => 'Alfonso Mitxelena',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'elena.aristegui@hettich.com'],
            [
                'name' => 'Elena Aristegui',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'javier.unanue@hettich.com'],
            [
                'name' => 'Javier Unanue',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'jesus.diaz@hettich.com'],
            [
                'name' => 'Jesus Diaz',
                'password' => bcrypt('hettich2025'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'felix.tena@hettich.com'],
            [
                'name' => 'Felix Tena',
                'password' => bcrypt('hettich2025'),
            ]
        );

        // Agrega más usuarios si quieres
    }
}