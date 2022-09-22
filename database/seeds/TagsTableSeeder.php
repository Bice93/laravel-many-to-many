<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'computer',
            'tech',
            'notebook',
            'technology',
            'informatics',
            'italy',
            '2022',
            'fitness',
            'gym',
            'workout',
            'fitnessmotivation',
            'bodybuilding',
            'politics',
            'andiamoagovernare',
            'green',
            'sea',
            'sostenibilità',
            'ecologia',
            'photography',
            'style',
            'beauty',
            'newcollection'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
