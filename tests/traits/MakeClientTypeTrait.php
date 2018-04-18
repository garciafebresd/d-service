<?php

use Faker\Factory as Faker;
use App\Models\ClientType;
use App\Repositories\ClientTypeRepository;

trait MakeClientTypeTrait
{
    /**
     * Create fake instance of ClientType and save it in database
     *
     * @param array $clientTypeFields
     * @return ClientType
     */
    public function makeClientType($clientTypeFields = [])
    {
        /** @var ClientTypeRepository $clientTypeRepo */
        $clientTypeRepo = App::make(ClientTypeRepository::class);
        $theme = $this->fakeClientTypeData($clientTypeFields);
        return $clientTypeRepo->create($theme);
    }

    /**
     * Get fake instance of ClientType
     *
     * @param array $clientTypeFields
     * @return ClientType
     */
    public function fakeClientType($clientTypeFields = [])
    {
        return new ClientType($this->fakeClientTypeData($clientTypeFields));
    }

    /**
     * Get fake data of ClientType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClientTypeData($clientTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $clientTypeFields);
    }
}
