<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'leave_code' => $this->faker->name,
            'employee_id' => 4,
            'submit_date' =>  $this->faker->date(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'leave_amount' => 1,
            'type_of_leave' => 'Sick Leave',
            'description' => 'DBD',
            'phone' => $this->faker->phoneNumber,
            'approver' => $this->faker->name,
            'approved_date' => $this->faker->date(),
            'status' => 1,
            'softdelete' => 0,

        ];
    }
}
