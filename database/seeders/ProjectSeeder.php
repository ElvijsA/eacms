<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
          'name' => 'EACMS',
          'edited_by' => '1',
          'author_id' => '1',
      ]);

      DB::table('project_user')->insert([
          'user_id' => '1',
          'project_id' => '1',
      ]);
    }
}
