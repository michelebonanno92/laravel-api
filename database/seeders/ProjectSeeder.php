<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Project;
use App\Models\Type;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $name = fake()->sentence();
            $slug = str()->slug($name);

            $randomTypeId = null ;

            if(rand(0,1)) {
                // prendo un tipo casuale dal db
                $randomType = Type::inRandomOrder()->first();
                $randomTypeId =  $randomType->id;
            }

            Project::create([
                'name' => $name,
                'slug' => str()->slug($name),
                // utilizzato Model Type con il count() associzmo ad ogni elemento della tabella type ad ogni numero casuale con il rand
                'type_id' => $randomTypeId,

            ]);
        }

        // oppure senza un if 
        // for ($i = 0; $i < 10; $i++) {
        //     $name = fake()->sentence();
        //     $slug = str()->slug($name);

        //     // facciamo un'istanza della classe type , prendiamo tutti gli elementi presenti nel model Type li mischiamo con inRandomOrder ordinandoli in modo casuale e con first prendiamo il primo della nuova "lista" 
        //     $randomProject = Type::inRandomOrder()->first();
        //     // dd($randomProject);

        //     Project::create([
        //         'name' => $name,
        //         'slug' => str()->slug($name),
        //         // utilizzato Model Type con il count() associzmo ad ogni elemento della tabella type ad ogni numero casuale con il rand
        //         'type_id' => $randomProject->id,

        //     ]);
        // }
    }  
}