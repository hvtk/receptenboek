<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Account;

class AccountFactory extends Factory
{

    /**
     * The name of the factoryś corresponding model.
     * 
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "user_id" => \App\Models\User::factory()->create()->id,
            "full_name" => $this->faker->fullName,
            "email" => $this->faker->email,
            "phone" => $this->faker->phone,
            "street" => $this->faker->street,
            "city" => $this->faker->city,
            "state" => $this->faker->state,
            "zip_code" => $this->faker->zipCode,
        ];
    }
}
