<?php
use App\Template;
use App\User;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::truncate();
        User::truncate();
        User::create(['name' => 'Administrator', 'email'=>'email@domain.com', 'password'=>Hash::make('pass123')]);
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Template::create(['title'=>$faker->sentence, 'body'=>$faker->paragraph]);
        }
    }
}
