<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogArticlesSeeder extends Seeder
{
    public function run(): void
    {
        $luigi = User::where('name', 'Luigi')->first();
        $davide = User::where('name', 'Davide')->first();
        $valentina = User::where('name', 'Valentina')->first();

        $articles = [
            [
                'title' => 'Comprendere il Trauma e la Resilienza',
                'content' => 'Il trauma non è solo ciò che ci accade, ma come il nostro sistema nervoso risponde. La resilienza è la capacità di integrare queste esperienze e ritrovare un equilibrio interiore attraverso percorsi di cura consapevoli.',
                'tags' => ['trauma', 'mente', 'psicologia'],
                'user' => $luigi
            ],
            [
                'title' => 'Mindfulness: Vivere nel Momento Presente',
                'content' => 'La mindfulness ci insegna a osservare i nostri pensieri e le nostre emozioni senza giudizio. Praticare la consapevolezza quotidiana riduce lo stress e migliora significativamente la qualità della nostra vita.',
                'tags' => ['mindfulness', 'meditazione', 'benessere'],
                'user' => $valentina
            ],
            [
                'title' => 'Nuovi Approcci nella Trauma Therapy',
                'content' => 'La terapia del trauma moderna utilizza tecniche come l\'EMDR e l\'approccio somatico per aiutare le persone a elaborare i ricordi traumatici bloccati nel corpo, portando a una guarigione profonda e duratura.',
                'tags' => ['trauma', 'terapia', 'corpo'],
                'user' => $davide
            ],
            [
                'title' => 'I Benefici di un Silence Retreat',
                'content' => 'In un mondo sempre più rumoroso, il ritiro del silenzio offre l\'opportunità unica di ascoltare la propria voce interiore. Giornate di silenzio assoluto possono portare a intuizioni profonde e a una pace mentale inaspettata.',
                'tags' => ['meditazione', 'mente', 'benessere'],
                'user' => $luigi
            ],
            [
                'title' => 'Psicologia e Benessere Emotivo',
                'content' => 'La psicologia moderna si concentra non solo sulla cura del disagio, ma anche sulla promozione del benessere. Capire i nostri schemi mentali è fondamentale per costruire relazioni sane e una vita appagante.',
                'tags' => ['psicologia', 'mente', 'terapia'],
                'user' => $valentina
            ],
            [
                'title' => 'Gestire l\'Ansia attraverso il Respiro',
                'content' => 'L\'ansia si manifesta spesso attraverso sintomi fisici. Imparare a controllare il respiro e a connettersi con il proprio corpo è uno degli strumenti più efficaci della psicologia per calmare il sistema nervoso.',
                'tags' => ['ansia', 'corpo', 'psicologia'],
                'user' => $davide
            ],
            [
                'title' => 'La Depressione: Chiedere Aiuto è Forza',
                'content' => 'Affrontare la depressione richiede coraggio e supporto. È importante riconoscere i segnali e sapere che esistono percorsi terapeutici efficaci che possono riportare la luce nella vita delle persone.',
                'tags' => ['depressione', 'psicologia', 'terapia'],
                'user' => $luigi
            ],
        ];

        foreach ($articles as $data) {
            $article = $data['user']->articles()->create([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);

            $tagIds = Tag::whereIn('name', $data['tags'])->pluck('id');
            $article->tags()->sync($tagIds);
        }
    }
}
