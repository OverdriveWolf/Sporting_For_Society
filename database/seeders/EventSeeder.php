<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ensure Roles exist (matching ERD role_id dependency)
        $organizerRole = Role::firstOrCreate(['name' => 'Organizer']);
        $participantRole = Role::firstOrCreate(['name' => 'Participant']);

        // 2. Ensure Categories exist (matching ERD category_id dependency)
        $tennisCategory = Category::firstOrCreate(['name' => 'Tennis']);
        $soccerCategory = Category::firstOrCreate(['name' => 'Soccer']);
        $basketballCategory = Category::firstOrCreate(['name' => 'Basketball']);
        $runningCategory = Category::firstOrCreate(['name' => 'Running']);

        // 3. Ensure Organizer User exists (matching ERD organizer_id dependency)
        $organizer = User::firstOrCreate(
            ['email' => 'marcus.vance@domain.com'],
            [
                'name' => 'Marcus Vance',
                'password' => Hash::make('password123'),
                'role_id' => $organizerRole->id,
            ]
        );

        // 4. Create Sample Participants
        $participant1 = User::firstOrCreate(
            ['email' => 'clara.zheng@domain.com'],
            [
                'name' => 'Clara Zheng',
                'password' => Hash::make('password123'),
                'role_id' => $participantRole->id,
            ]
        );

        $participant2 = User::firstOrCreate(
            ['email' => 'dmitri.petrov@domain.com'],
            [
                'name' => 'Dmitri Petrov',
                'password' => Hash::make('password123'),
                'role_id' => $participantRole->id,
            ]
        );

        // 5. Create Events matching your exact table schema
        $event1 = Event::create([
            'title'            => 'Sunset Co-ed Singles Match',
            'description'      => 'Join us for a friendly, high-energy singles matchup session at McCarren Park. Intermediate level preferred.',
            'location'         => 'McCarren Park Courts, Brooklyn',
            'event_date'       => now()->addDays(2)->setHour(16)->setMinute(0),
            'max_participants' => 16,
            'organizer_id'     => $organizer->id,
            'category_id'      => $tennisCategory->id,
        ]);

        $event2 = Event::create([
            'title'            => 'Friday Night 8v8 Turf Scrimmage',
            'description'      => 'Fast-paced intermediate soccer session under the lights. Bring turf shoes and shin guards.',
            'location'         => 'Pier 5 Brooklyn Bridge Park',
            'event_date'       => now()->addDays(4)->setHour(19)->setMinute(30),
            'max_participants' => 24,
            'organizer_id'     => $organizer->id,
            'category_id'      => $soccerCategory->id,
        ]);

        $event3 = Event::create([
            'title'            => 'Saturday Morning 3v3 Half-Court',
            'description'      => 'Casual weekend pickup games. Teams rotate after 11 points.',
            'location'         => 'Brooklyn Heights Playground',
            'event_date'       => now()->addDays(5)->setHour(9)->setMinute(0),
            'max_participants' => 12,
            'organizer_id'     => $organizer->id,
            'category_id'      => $basketballCategory->id,
        ]);

        // 6. Seed event_user pivot table with initial registrations
        $event1->participants()->attach($participant1->id, [
            'status'        => 'Registered',
            'registered_at' => now(),
        ]);

        $event1->participants()->attach($participant2->id, [
            'status'        => 'Registered',
            'registered_at' => now(),
        ]);
    }
}