<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServiceTypeAPIRequest;
use App\Http\Requests\API\UpdateServiceTypeAPIRequest;
use App\Models\ServiceType;
use App\Repositories\ServiceTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceTypeController
 * @package App\Http\Controllers\API
 */
class ServiceTypeAPIController extends AppBaseController {

    /** @var  ServiceTypeRepository */
    private $serviceTypeRepository;

    public function __construct(ServiceTypeRepository $serviceTypeRepo) {
        $this->serviceTypeRepository = $serviceTypeRepo;
    }

    /**
     * Display a listing of the ServiceType.
     * GET|HEAD /serviceTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->serviceTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceTypes = $this->serviceTypeRepository->all();

        return $this->sendResponse($serviceTypes->toArray(), 'Service Types retrieved successfully');
    }

    /**
     * Store a newly created ServiceType in storage.
     * POST /serviceTypes
     *
     * @param CreateServiceTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceTypeAPIRequest $request) {
        $input = $request->all();

        $serviceTypes = $this->serviceTypeRepository->create($input);

        return $this->sendResponse($serviceTypes->toArray(), 'Service Type saved successfully');
    }

    /**
     * Display the specified ServiceType.
     * GET|HEAD /serviceTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var ServiceType $serviceType */
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            return $this->sendError('Service Type not found');
        }

        return $this->sendResponse($serviceType->toArray(), 'Service Type retrieved successfully');
    }

    /**
     * Update the specified ServiceType in storage.
     * PUT/PATCH /serviceTypes/{id}
     *
     * @param  int $id
     * @param UpdateServiceTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceTypeAPIRequest $request) {
        $input = $request->all();

        /** @var ServiceType $serviceType */
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            return $this->sendError('Service Type not found');
        }

        $serviceType = $this->serviceTypeRepository->update($input, $id);

        return $this->sendResponse($serviceType->toArray(), 'ServiceType updated successfully');
    }

    /**
     * Remove the specified ServiceType from storage.
     * DELETE /serviceTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var ServiceType $serviceType */
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            return $this->sendError('Service Type not found');
        }

        $serviceType->delete();

        return $this->sendResponse($id, 'Service Type deleted successfully');
    }

}
