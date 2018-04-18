<?php

use Faker\Factory as Faker;
use App\Models\Vehicles;
use App\Repositories\VehiclesRepository;

trait MakeVehiclesTrait
{
    /**
     * Create fake instance of Vehicles and save it in database
     *
     * @param array $vehiclesFields
     * @return Vehicles
     */
    public function makeVehicles($vehiclesFields = [])
    {
        /** @var VehiclesRepository $vehiclesRepo */
        $vehiclesRepo = App::make(VehiclesRepository::class);
        $theme = $this->fakeVehiclesData($vehiclesFields);
        return $vehiclesRepo->create($theme);
    }

    /**
     * Get fake instance of Vehicles
     *
     * @param array $vehiclesFields
     * @return Vehicles
     */
    public function fakeVehicles($vehiclesFields = [])
    {
        return new Vehicles($this->fakeVehiclesData($vehiclesFields));
    }

    /**
     * Get fake data of Vehicles
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVehiclesData($vehiclesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'plate_code' => $fake->word,
            'vehicle_type_id' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $vehiclesFields);
    }
}
