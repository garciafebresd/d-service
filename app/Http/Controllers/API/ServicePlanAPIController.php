<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServicePlanAPIRequest;
use App\Http\Requests\API\UpdateServicePlanAPIRequest;
use App\Models\ServicePlan;
use App\Repositories\ServicePlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServicePlanController
 * @package App\Http\Controllers\API
 */
class ServicePlanAPIController extends AppBaseController {

    /** @var  ServicePlanRepository */
    private $servicePlanRepository;

    public function __construct(ServicePlanRepository $servicePlanRepo) {
        $this->servicePlanRepository = $servicePlanRepo;
    }

    /**
     * Display a listing of the ServicePlan.
     * GET|HEAD /servicePlans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->servicePlanRepository->pushCriteria(new RequestCriteria($request));
        $this->servicePlanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $servicePlans = $this->servicePlanRepository->all();

        return $this->sendResponse($servicePlans->toArray(), 'Service Plans retrieved successfully');
    }

    /**
     * Store a newly created ServicePlan in storage.
     * POST /servicePlans
     *
     * @param CreateServicePlanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServicePlanAPIRequest $request) {
        $input = $request->all();

        $servicePlans = $this->servicePlanRepository->create($input);

        return $this->sendResponse($servicePlans->toArray(), 'Service Plan saved successfully');
    }

    /**
     * Display the specified ServicePlan.
     * GET|HEAD /servicePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var ServicePlan $servicePlan */
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            return $this->sendError('Service Plan not found');
        }

        return $this->sendResponse($servicePlan->toArray(), 'Service Plan retrieved successfully');
    }

    /**
     * Update the specified ServicePlan in storage.
     * PUT/PATCH /servicePlans/{id}
     *
     * @param  int $id
     * @param UpdateServicePlanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicePlanAPIRequest $request) {
        $input = $request->all();

        /** @var ServicePlan $servicePlan */
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            return $this->sendError('Service Plan not found');
        }

        $servicePlan = $this->servicePlanRepository->update($input, $id);

        return $this->sendResponse($servicePlan->toArray(), 'ServicePlan updated successfully');
    }

    /**
     * Remove the specified ServicePlan from storage.
     * DELETE /servicePlans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var ServicePlan $servicePlan */
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            return $this->sendError('Service Plan not found');
        }

        $servicePlan->delete();

        return $this->sendResponse($id, 'Service Plan deleted successfully');
    }

}
