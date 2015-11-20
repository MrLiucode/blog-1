<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => str_random(10),
        'order' => rand(100, 999),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text(500),
        'hits' => $faker->numberBetween(1, 1000),
        'is_top' => $faker->boolean(),
        'status' => $faker->boolean(),
        'user_id' => 1,
        'published_at' => $faker->unixTime,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

$factory->define(App\Models\ArticleCategory::class, function (Faker\Generator $faker) {
    return [
        'article_id' => $faker->numberBetween(1, 120),
        'category_id' => $faker->numberBetween(1, 100),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

$factory->define(App\Models\ArticleTag::class, function (Faker\Generator $faker) {
    return [
        'article_id' => $faker->numberBetween(1, 120),
        'tag_id' => $faker->numberBetween(1, 40),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});


$factory->define(App\Models\UserInfo::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'mobile' => '13076378594',
        'website' => 'https://github.com/fakeronline',
        'synopsis' => '个人简介',
        'live_province' => '广东省',
        'live_city' => '深圳市',
        'live_area' => '龙岗区',
        'live_address' => 'XXX村XX路XX大厦',
        'position' => 'PHP开发工程师',
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime
    ];
});

