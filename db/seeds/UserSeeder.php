<?php


use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Factory::create();
        $data = [];
        $count = 3;
        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'username' => $faker->userName,
                'password' => password_hash('oink123', PASSWORD_BCRYPT),
                'email' => $faker->email,
                'name' => $faker->name
            ];
        }

        $this->insert('onk_users', $data);
    }
}
