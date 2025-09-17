<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Type_news::create([
            'type_news_desc' => 'Normal',
        ]);

        \App\Models\Type_news::create([
            'type_news_desc' => 'Urgente',
        ]);

        \App\Models\News::factory(2)->create();
    }
}
