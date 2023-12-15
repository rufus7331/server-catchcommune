<?php

namespace Database\Seeders;

use App\Models\CatchEntry;
use Illuminate\Database\Seeder;

class CatchEntrySeeder extends Seeder
{
    public function run(): void
    {
         CatchEntry::factory()->count(10)->create();
    }
}
