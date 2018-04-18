<?php

use Faker\Factory as Faker;
use App\Models\PaymentMethodEnabled;
use App\Repositories\PaymentMethodEnabledRepository;

trait MakePaymentMethodEnabledTrait
{
    /**
     * Create fake instance of PaymentMethodEnabled and save it in database
     *
     * @param array $paymentMethodEnabledFields
     * @return PaymentMethodEnabled
     */
    public function makePaymentMethodEnabled($paymentMethodEnabledFields = [])
    {
        /** @var PaymentMethodEnabledRepository $paymentMethodEnabledRepo */
        $paymentMethodEnabledRepo = App::make(PaymentMethodEnabledRepository::class);
        $theme = $this->fakePaymentMethodEnabledData($paymentMethodEnabledFields);
        return $paymentMethodEnabledRepo->create($theme);
    }

    /**
     * Get fake instance of PaymentMethodEnabled
     *
     * @param array $paymentMethodEnabledFields
     * @return PaymentMethodEnabled
     */
    public function fakePaymentMethodEnabled($paymentMethodEnabledFields = [])
    {
        return new PaymentMethodEnabled($this->fakePaymentMethodEnabledData($paymentMethodEnabledFields));
    }

    /**
     * Get fake data of PaymentMethodEnabled
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaymentMethodEnabledData($paymentMethodEnabledFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paymentMethodEnabledFields);
    }
}
