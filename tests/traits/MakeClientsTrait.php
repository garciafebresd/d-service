<?php

use Faker\Factory as Faker;
use App\Models\Clients;
use App\Repositories\ClientsRepository;

trait MakeClientsTrait
{
    /**
     * Create fake instance of Clients and save it in database
     *
     * @param array $clientsFields
     * @return Clients
     */
    public function makeClients($clientsFields = [])
    {
        /** @var ClientsRepository $clientsRepo */
        $clientsRepo = App::make(ClientsRepository::class);
        $theme = $this->fakeClientsData($clientsFields);
        return $clientsRepo->create($theme);
    }

    /**
     * Get fake instance of Clients
     *
     * @param array $clientsFields
     * @return Clients
     */
    public function fakeClients($clientsFields = [])
    {
        return new Clients($this->fakeClientsData($clientsFields));
    }

    /**
     * Get fake data of Clients
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClientsData($clientsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'dni' => $fake->word,
            'name' => $fake->word,
            'last_name' => $fake->word,
            'legal_name' => $fake->word,
            'phone_number' => $fake->word,
            'email_address' => $fake->word,
            'address' => $fake->word,
            'client_type_id' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $clientsFields);
    }
}
