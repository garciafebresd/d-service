<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServiceAPIRequest;
use App\Http\Requests\API\UpdateServiceAPIRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceController
 * @package App\Http\Controllers\API
 */
class ServiceAPIController extends AppBaseController {

    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo) {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     * GET|HEAD /services
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->serviceRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $services = $this->serviceRepository->all();

        return $this->sendResponse($services->toArray(), 'Services retrieved successfully');
    }

    /**
     * Store a newly created Service in storage.
     * POST /services
     *
     * @param CreateServiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceAPIRequest $request) {
        $input = $request->all();

        $services = $this->serviceRepository->create($input);

        return $this->sendResponse($services->toArray(), 'Service saved successfully');
    }

    /**
     * Display the specified Service.
     * GET|HEAD /services/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Service $service */
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }

        return $this->sendResponse($service->toArray(), 'Service retrieved successfully');
    }

    /**
     * Update the specified Service in storage.
     * PUT/PATCH /services/{id}
     *
     * @param  int $id
     * @param UpdateServiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceAPIRequest $request) {
        $input = $request->all();

        /** @var Service $service */
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }

        $service = $this->serviceRepository->update($input, $id);

        return $this->sendResponse($service->toArray(), 'Service updated successfully');
    }

    /**
     * Remove the specified Service from storage.
     * DELETE /services/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Service $service */
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }

        $service->delete();

        return $this->sendResponse($id, 'Service deleted successfully');
    }

}
