<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\house::class, function (Faker $faker) use ($factory) {
    
    return [
        'user_id'=>$factory->create(App\User::class)->id,
        'build_year'=>$faker->numberBetween(1370,1397),
        'type'=>$faker->randomElement(['ویلایی','آپارتمان','زمین','مستغلات','کلنگی']),
        'rooms'=>$faker->numberBetween(1,5),
        'parking'=>$faker->numberBetween(0,1),
        'elevator'=>$faker->numberBetween(0,1),
        'anbari'=>$faker->numberBetween(0,1),
        'balcony'=>$faker->numberBetween(0,1),
        'floor'=>$faker->numberBetween(1,10),
        'RentorSell'=>$faker->numberBetween(0,1),
        'city'=>$factory->create(App\city::class)->id,
        'location_id'=>$factory->create(App\location::class)->id,
        'address'=>$faker->address,
        'cost'=>$faker->numberBetween(150000000,10000000000),
        'rent'=>$faker->numberBetween(1000,8000000),
        'meterage'=>$faker->numberBetween(20,500),
        'comment'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
        'photo'=>$faker->imageUrl($width = 640, $height = 480),
    
        'zipcode'=>$faker->numberBetween(100000,999999),
    ];
});

$factory->define(App\location::class,function(Faker $faker) use ($factory) {
    return[
        'city_id'=>$factory->create(App\city::class)->id,
        'district'=>$faker->randomElement(['نارمک', 'ونک', 'تهرانپارس','شمران','قلهک','پامنار','مجیدیه','وحیدیه','مولوی']),
        'comment'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
    ];
});

$factory->define(App\profile::class,function(Faker $faker) use ($factory) {
    return[
        'photo'=>$faker->imageUrl($width = 640, $height = 480),
        'user_id'=>$factory->create(App\User::class)->id,
        'phonenum'=>5647894684,
        'fname'=>$faker->firstName,
        'lname'=>$faker->lastName,
        'isagent'=>$faker->numberBetween(0,1),
        'isbongah'=>$faker->numberBetween(0,1),
        'location_id'=>$factory->create(App\location::class)->id,
        'city_id'=>$factory->create(App\city::class)->id,
        'score'=>$faker->numberBetween(0,100),
        'zip'=>1231215145,
        'comment'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
    ];
});

$factory->define(App\city::class,function(Faker $faker){
    return[
        
        'city'=>$faker->randomElement(['ایلام','تبریز','کرمانشاه','همدان','کرمان','یزد','مشهد', 'اصفهان', 'قم','تهران']),
        'comment'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
    ];
});