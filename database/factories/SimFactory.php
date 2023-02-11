<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sim>
 */
class SimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prefix = $this->faker->randomElement(['032','033','034','035','036','038','039','086','096','097','098','088','091','094','083','084','085','081','082',
        '089','090','093','070','079','077','076','078']);
        $phone = $this->faker->unique()->numerify('#######');
        return [
            //
            'phone'=>$prefix.$phone,
            'iccid'=>$this->faker->unique()->numerify('###############'),
            'status'=>1,
        ];
    }

    public function randPrefix()
    {
        # code...
        $prfix = [
            '032','033','034','035','036','038','039','086','096','097','098','088','091','094','083','084','085','081','082',
            '089','090','093','070','079','077','076','078'
        ];
        return array_rand($prfix);
    }
}
