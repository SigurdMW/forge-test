<?php 

use Illuminate\Database\Seeder;
use App\Article;
use App\User;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {
	
	public function run()
	{

		$faker = Faker::create();

		$userIds = User::lists('id');

		foreach(range(1,30) as $index)
		{
			Article::create([
				'title' 	=> $faker->sentence,
				'body' 		=> $faker->paragraph(10),
				'user_id' 	=> $faker->randomElement($userIds->toArray()),
			]);
		}

	}

}

