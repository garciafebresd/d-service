<?php

use Faker\Factory as Faker;
use App\Models\ConfigTable;
use App\Repositories\ConfigTableRepository;

trait MakeConfigTableTrait
{
    /**
     * Create fake instance of ConfigTable and save it in database
     *
     * @param array $configTableFields
     * @return ConfigTable
     */
    public function makeConfigTable($configTableFields = [])
    {
        /** @var ConfigTableRepository $configTableRepo */
        $configTableRepo = App::make(ConfigTableRepository::class);
        $theme = $this->fakeConfigTableData($configTableFields);
        return $configTableRepo->create($theme);
    }

    /**
     * Get fake instance of ConfigTable
     *
     * @param array $configTableFields
     * @return ConfigTable
     */
    public function fakeConfigTable($configTableFields = [])
    {
        return new ConfigTable($this->fakeConfigTableData($configTableFields));
    }

    /**
     * Get fake data of ConfigTable
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConfigTableData($configTableFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $configTableFields);
    }
}
