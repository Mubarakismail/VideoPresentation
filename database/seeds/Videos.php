<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        $ids=[1,2,3,4,5,6,7,8,9,10];
        $youtube=[
            'https://www.youtube.com/watch?v=eSCKNKp6N8c',
            'https://www.youtube.com/watch?v=DQrErjsBo4c',
            'https://www.youtube.com/watch?v=Pv0HjFCsTpw',
            'https://www.youtube.com/watch?v=mYgMIXCQeLQ',
            'https://www.youtube.com/watch?v=3uVpQsY2lkY',
        ];
        $images=[
            '16183298693aREPiooOI.jpg',
            '161870690727XBO7wzSL.jpg',
            '161832934469XVWfMXOP.jpg',
            '1618706851X8eT4yVQXm.png',
            '1618706786V54EZSvDDY.png',
        ];
        for ($i=0;$i<10;$i++)
        {
            $array=[
                'name'=>$faker->word,
                'meta_keywords'=>$faker->name,
                'meta_des'=>$faker->text,
                'cat_id'=>1,
                'youtube'=>$youtube[rand(0,4)],
                'published'=>rand(0,1),
                'image'=>$images[rand(0,4)],
                'des'=>$faker->paragraph,
                'user_id'=>1
            ];
            $video=\App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids,3));
            $video->tags()->sync(array_rand($ids,2));
        }
    }
}
