<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaymentMethodAPIRequest;
use App\Http\Requests\API\UpdatePaymentMethodAPIRequest;
use App\Models\PaymentMethod;
use App\Repositories\PaymentMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaymentMethodController
 * @package App\Http\Controllers\API
 */
class PaymentMethodAPIController extends AppBaseController {

    /** @var  PaymentMethodRepository */
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepo) {
        $this->paymentMethodRepository = $paymentMethodRepo;
    }

    /**
     * Display a listing of the PaymentMethod.
     * GET|HEAD /paymentMethods
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->paymentMethodRepository->pushCriteria(new RequestCriteria($request));
        $this->paymentMethodRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paymentMethods = $this->paymentMethodRepository->all();

        return $this->sendResponse($paymentMethods->toArray(), 'Payment Methods retrieved successfully');
    }

    /**
     * Store a newly created PaymentMethod in storage.
     * POST /paymentMethods
     *
     * @param CreatePaymentMethodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentMethodAPIRequest $request) {
        $input = $request->all();

        $paymentMethods = $this->paymentMethodRepository->create($input);

        return $this->sendResponse($paymentMethods->toArray(), 'Payment Method saved successfully');
    }

    /**
     * Display the specified PaymentMethod.
     * GET|HEAD /paymentMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var PaymentMethod $paymentMethod */
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            return $this->sendError('Payment Method not found');
        }

        return $this->sendResponse($paymentMethod->toArray(), 'Payment Method retrieved successfully');
    }

    /**
     * Update the specified PaymentMethod in storage.
     * PUT/PATCH /paymentMethods/{id}
     *
     * @param  int $id
     * @param UpdatePaymentMethodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentMethodAPIRequest $request) {
        $input = $request->all();

        /** @var PaymentMethod $paymentMethod */
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            return $this->sendError('Payment Method not found');
        }

        $paymentMethod = $this->paymentMethodRepository->update($input, $id);

        return $this->sendResponse($paymentMethod->toArray(), 'PaymentMethod updated successfully');
    }

    /**
     * Remove the specified PaymentMethod from storage.
     * DELETE /paymentMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var PaymentMethod $paymentMethod */
        $paymentMethod = $this->paymentMethodRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            return $this->sendError('Payment Method not found');
        }

        $paymentMethod->delete();

        return $this->sendResponse($id, 'Payment Method deleted successfully');
    }

}
