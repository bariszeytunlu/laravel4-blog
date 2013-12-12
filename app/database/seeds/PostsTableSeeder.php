<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('posts')->truncate();

		$posts = array(

            'title' => 'Laravel Controllers',
            'slug' => Str::slug('Laravel Controllers'),
            'content' => 'remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'

		);

		// Uncomment the below to run the seeder
		DB::table('posts')->insert($posts);
	}

}
