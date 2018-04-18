<?php

use Faker\Factory as Faker;
use App\Models\VehiclesType;
use App\Repositories\VehiclesTypeRepository;

trait MakeVehiclesTypeTrait
{
    /**
     * Create fake instance of VehiclesType and save it in database
     *
     * @param array $vehiclesTypeFields
     * @return VehiclesType
     */
    public function makeVehiclesType($vehiclesTypeFields = [])
    {
        /** @var VehiclesTypeRepository $vehiclesTypeRepo */
        $vehiclesTypeRepo = App::make(VehiclesTypeRepository::class);
        $theme = $this->fakeVehiclesTypeData($vehiclesTypeFields);
        return $vehiclesTypeRepo->create($theme);
    }

    /**
     * Get fake instance of VehiclesType
     *
     * @param array $vehiclesTypeFields
     * @return VehiclesType
     */
    public function fakeVehiclesType($vehiclesTypeFields = [])
    {
        return new VehiclesType($this->fakeVehiclesTypeData($vehiclesTypeFields));
    }

    /**
     * Get fake data of VehiclesType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVehiclesTypeData($vehiclesTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'name' => $fake->word,
            'description' => $fake->word,
            'json_data' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $vehiclesTypeFields);
    }
}
