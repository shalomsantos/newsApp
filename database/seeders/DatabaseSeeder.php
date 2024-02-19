<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test123',
        ]);
        \App\Models\Type_news::factory()->create([
            'type_news_desc' => 'Urgente',
        ]);
        \App\Models\Type_news::factory()->create([
            'type_news_desc' => 'Diário',
        ]);
        \App\Models\News::factory()->create([
            'id_type_news' => '1',
            'title' => 'Guerra eminente',
            'desc_news' => 'Tensões globais atingem seu ápice, enquanto nações fictícias de Zafiria e Lumara disputam recursos escassos, aumentando o risco de uma guerra iminente que poderia alterar o equilíbrio geopolítico.',
        ]);
        \App\Models\News::factory()->create([
            'id_type_news' => '2',
            'title' => 'Descoberta Científica Revolucionária',
            'desc_news' => 'Pesquisadores revelam avanço surpreendente que desafia paradigmas científicos, prometendo transformar fundamentalmente a compreensão da realidade. Detalhes sigilosos aguardam revelação oficial.',
        ]);
        
    }
}
