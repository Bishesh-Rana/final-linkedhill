<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $direction = ['East', 'West', 'North', 'South'];
        $status = ['Rent', 'Lease', 'Sell'];
        $type = ['Commercial', 'Agriculture', 'Office Space'];
        return [
            "status" => rand(0, 1),
            "property_status" => $status[array_rand($status, 1)],
            "type" =>  $type[array_rand($type, 1)],
            "title" => $this->faker->city(),
            "slug" => "house-for-sale",
            "property_detail" => $this->faker->sentence(),
            "property_address" => $this->faker->city(),
            "map_location" => $this->faker->latitude($min = -90, $max = 90) . ',' . $this->faker->longitude($min = -180, $max = 180),
            "city_id" => rand(1, 773),
            "area_id" => 1,
            "zipcode" => $this->faker->numberBetween($min = 10000, $max = 99999),
            "total_area" => $this->faker->numberBetween(2, 9),
            "total_area_unit" =>  1,
            "built_up_area" =>  $this->faker->numberBetween(2, 9),
            "built_up_area_unit" => 1,
            "property_facing" => $direction[array_rand($direction)],
            "road_access" => rand(1, 10),
            "road_access_unit" => rand(1, 7),
            "road_type" => "2",
            "start_price" => $start = rand(10000, 55555),
            "end_price" => $start + rand(100, 55555),
            "price_label" => array_rand(['per Daam', 'Per Room', 'Whole Room'], 1),
            "owner_name" => $this->faker->name(),
            "owner_address" => $this->faker->streetAddress(),
            "owner_phone" => (int) $this->faker->e164PhoneNumber(),
            "youtube_video_id" => null,
            "feature" => rand(0, 1),
            "user_id" => 1,
            "admin_id" => 1,
            "category_id" => 1,
            "view_count" => 1,
            "premium_property" => rand(0, 1),
            "hasAgent" => 1,
            "deleted_at" => null,
            "created_at" => now(),
            "updated_at" => now(),
            "meta_keyword" => null,
            "meta_description" => null
        ];
    }
}
