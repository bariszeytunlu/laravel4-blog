<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('categories')->truncate();

        $data = array('PHP', 'CSS', 'Web Development', 'Front-End', 'HTML 5', 'MySQL', 'NodeJS', 'MangoDB');
        $categories = array();

        foreach ($data as $row) {

            $categories[] = array(
                'name' => $row,
                'slug' => Str::slug($row)
            );

        }

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}
