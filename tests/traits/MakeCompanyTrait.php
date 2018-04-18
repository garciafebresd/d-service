<?php

use Faker\Factory as Faker;
use App\Models\Company;
use App\Repositories\CompanyRepository;

trait MakeCompanyTrait
{
    /**
     * Create fake instance of Company and save it in database
     *
     * @param array $companyFields
     * @return Company
     */
    public function makeCompany($companyFields = [])
    {
        /** @var CompanyRepository $companyRepo */
        $companyRepo = App::make(CompanyRepository::class);
        $theme = $this->fakeCompanyData($companyFields);
        return $companyRepo->create($theme);
    }

    /**
     * Get fake instance of Company
     *
     * @param array $companyFields
     * @return Company
     */
    public function fakeCompany($companyFields = [])
    {
        return new Company($this->fakeCompanyData($companyFields));
    }

    /**
     * Get fake data of Company
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCompanyData($companyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'identifier' => $fake->word,
            'legal_name' => $fake->word,
            'logo_url' => $fake->word,
            'life' => $fake->date('Y-m-d H:i:s'),
            'register_at' => $fake->date('Y-m-d H:i:s'),
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $companyFields);
    }
}
