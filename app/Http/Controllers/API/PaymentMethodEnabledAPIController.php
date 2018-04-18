<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaymentMethodEnabledAPIRequest;
use App\Http\Requests\API\UpdatePaymentMethodEnabledAPIRequest;
use App\Models\PaymentMethodEnabled;
use App\Repositories\PaymentMethodEnabledRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaymentMethodEnabledController
 * @package App\Http\Controllers\API
 */
class PaymentMethodEnabledAPIController extends AppBaseController {

    /** @var  PaymentMethodEnabledRepository */
    private $paymentMethodEnabledRepository;

    public function __construct(PaymentMethodEnabledRepository $paymentMethodEnabledRepo) {
        $this->paymentMethodEnabledRepository = $paymentMethodEnabledRepo;
    }

    /**
     * Display a listing of the PaymentMethodEnabled.
     * GET|HEAD /paymentMethodEnableds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->paymentMethodEnabledRepository->pushCriteria(new RequestCriteria($request));
        $this->paymentMethodEnabledRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paymentMethodEnableds = $this->paymentMethodEnabledRepository->all();

        return $this->sendResponse($paymentMethodEnableds->toArray(), 'Payment Method Enableds retrieved successfully');
    }

    /**
     * Store a newly created PaymentMethodEnabled in storage.
     * POST /paymentMethodEnableds
     *
     * @param CreatePaymentMethodEnabledAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentMethodEnabledAPIRequest $request) {
        $input = $request->all();

        $paymentMethodEnableds = $this->paymentMethodEnabledRepository->create($input);

        return $this->sendResponse($paymentMethodEnableds->toArray(), 'Payment Method Enabled saved successfully');
    }

    /**
     * Display the specified PaymentMethodEnabled.
     * GET|HEAD /paymentMethodEnableds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var PaymentMethodEnabled $paymentMethodEnabled */
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            return $this->sendError('Payment Method Enabled not found');
        }

        return $this->sendResponse($paymentMethodEnabled->toArray(), 'Payment Method Enabled retrieved successfully');
    }

    /**
     * Update the specified PaymentMethodEnabled in storage.
     * PUT/PATCH /paymentMethodEnableds/{id}
     *
     * @param  int $id
     * @param UpdatePaymentMethodEnabledAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentMethodEnabledAPIRequest $request) {
        $input = $request->all();

        /** @var PaymentMethodEnabled $paymentMethodEnabled */
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            return $this->sendError('Payment Method Enabled not found');
        }

        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->update($input, $id);

        return $this->sendResponse($paymentMethodEnabled->toArray(), 'PaymentMethodEnabled updated successfully');
    }

    /**
     * Remove the specified PaymentMethodEnabled from storage.
     * DELETE /paymentMethodEnableds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var PaymentMethodEnabled $paymentMethodEnabled */
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            return $this->sendError('Payment Method Enabled not found');
        }

        $paymentMethodEnabled->delete();

        return $this->sendResponse($id, 'Payment Method Enabled deleted successfully');
    }

}
