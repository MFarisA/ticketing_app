<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        if ($users->isEmpty() || $events->isEmpty()) {
            $this->command->warn('Please run UserSeeder and EventSeeder first.');
            return;
        }

        // Create sample orders for history
        $event1 = $events->random();
        Order::create([
            'user_id' => $users->random()->id,
            'event_id' => $event1->id,
            'order_date' => now()->subDays(10),
            'total_harga' => 500000,
        ]);
        $this->command->info("Order created for event: {$event1->judul}");

        $event2 = $events->random();
        Order::create([
            'user_id' => $users->random()->id,
            'event_id' => $event2->id,
            'order_date' => now()->subDays(5),
            'total_harga' => 750000,
        ]);
        $this->command->info("Order created for event: {$event2->judul}");

        $event3 = $events->random();
        Order::create([
            'user_id' => $users->random()->id,
            'event_id' => $event3->id,
            'order_date' => now()->subDays(2),
            'total_harga' => 1000000,
        ]);
        $this->command->info("Order created for event: {$event3->judul}");

        $event4 = $events->random();
        Order::create([
            'user_id' => $users->random()->id,
            'event_id' => $event4->id,
            'order_date' => now()->subDay(),
            'total_harga' => 600000,
        ]);
        $this->command->info("Order created for event: {$event4->judul}");

        $this->command->info('HistorySeeder completed successfully.');
    }
}
