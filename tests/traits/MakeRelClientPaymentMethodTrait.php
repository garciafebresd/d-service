<?php

use Faker\Factory as Faker;
use App\Models\RelClientPaymentMethod;
use App\Repositories\RelClientPaymentMethodRepository;

trait MakeRelClientPaymentMethodTrait
{
    /**
     * Create fake instance of RelClientPaymentMethod and save it in database
     *
     * @param array $relClientPaymentMethodFields
     * @return RelClientPaymentMethod
     */
    public function makeRelClientPaymentMethod($relClientPaymentMethodFields = [])
    {
        /** @var RelClientPaymentMethodRepository $relClientPaymentMethodRepo */
        $relClientPaymentMethodRepo = App::make(RelClientPaymentMethodRepository::class);
        $theme = $this->fakeRelClientPaymentMethodData($relClientPaymentMethodFields);
        return $relClientPaymentMethodRepo->create($theme);
    }

    /**
     * Get fake instance of RelClientPaymentMethod
     *
     * @param array $relClientPaymentMethodFields
     * @return RelClientPaymentMethod
     */
    public function fakeRelClientPaymentMethod($relClientPaymentMethodFields = [])
    {
        return new RelClientPaymentMethod($this->fakeRelClientPaymentMethodData($relClientPaymentMethodFields));
    }

    /**
     * Get fake data of RelClientPaymentMethod
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRelClientPaymentMethodData($relClientPaymentMethodFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'client_id' => $fake->randomDigitNotNull,
            'payment_method_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $relClientPaymentMethodFields);
    }
}
