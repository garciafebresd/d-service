<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRelClientPaymentMethodAPIRequest;
use App\Http\Requests\API\UpdateRelClientPaymentMethodAPIRequest;
use App\Models\RelClientPaymentMethod;
use App\Repositories\RelClientPaymentMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RelClientPaymentMethodController
 * @package App\Http\Controllers\API
 */
class RelClientPaymentMethodAPIController extends AppBaseController {

    /** @var  RelClientPaymentMethodRepository */
    private $relClientPaymentMethodRepository;

    public function __construct(RelClientPaymentMethodRepository $relClientPaymentMethodRepo) {
        $this->relClientPaymentMethodRepository = $relClientPaymentMethodRepo;
    }

    /**
     * Display a listing of the RelClientPaymentMethod.
     * GET|HEAD /relClientPaymentMethods
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->relClientPaymentMethodRepository->pushCriteria(new RequestCriteria($request));
        $this->relClientPaymentMethodRepository->pushCriteria(new LimitOffsetCriteria($request));
        $relClientPaymentMethods = $this->relClientPaymentMethodRepository->all();

        return $this->sendResponse($relClientPaymentMethods->toArray(), 'Rel Client Payment Methods retrieved successfully');
    }

    /**
     * Store a newly created RelClientPaymentMethod in storage.
     * POST /relClientPaymentMethods
     *
     * @param CreateRelClientPaymentMethodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRelClientPaymentMethodAPIRequest $request) {
        $input = $request->all();

        $relClientPaymentMethods = $this->relClientPaymentMethodRepository->create($input);

        return $this->sendResponse($relClientPaymentMethods->toArray(), 'Rel Client Payment Method saved successfully');
    }

    /**
     * Display the specified RelClientPaymentMethod.
     * GET|HEAD /relClientPaymentMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var RelClientPaymentMethod $relClientPaymentMethod */
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            return $this->sendError('Rel Client Payment Method not found');
        }

        return $this->sendResponse($relClientPaymentMethod->toArray(), 'Rel Client Payment Method retrieved successfully');
    }

    /**
     * Update the specified RelClientPaymentMethod in storage.
     * PUT/PATCH /relClientPaymentMethods/{id}
     *
     * @param  int $id
     * @param UpdateRelClientPaymentMethodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelClientPaymentMethodAPIRequest $request) {
        $input = $request->all();

        /** @var RelClientPaymentMethod $relClientPaymentMethod */
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            return $this->sendError('Rel Client Payment Method not found');
        }

        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->update($input, $id);

        return $this->sendResponse($relClientPaymentMethod->toArray(), 'RelClientPaymentMethod updated successfully');
    }

    /**
     * Remove the specified RelClientPaymentMethod from storage.
     * DELETE /relClientPaymentMethods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var RelClientPaymentMethod $relClientPaymentMethod */
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            return $this->sendError('Rel Client Payment Method not found');
        }

        $relClientPaymentMethod->delete();

        return $this->sendResponse($id, 'Rel Client Payment Method deleted successfully');
    }

}
