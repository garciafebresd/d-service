<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehiclesTypeAPIRequest;
use App\Http\Requests\API\UpdateVehiclesTypeAPIRequest;
use App\Models\VehiclesType;
use App\Repositories\VehiclesTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VehiclesTypeController
 * @package App\Http\Controllers\API
 */
class VehiclesTypeAPIController extends AppBaseController {

    /** @var  VehiclesTypeRepository */
    private $vehiclesTypeRepository;

    public function __construct(VehiclesTypeRepository $vehiclesTypeRepo) {
        $this->vehiclesTypeRepository = $vehiclesTypeRepo;
    }

    /**
     * Display a listing of the VehiclesType.
     * GET|HEAD /vehiclesTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->vehiclesTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->vehiclesTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vehiclesTypes = $this->vehiclesTypeRepository->all();

        return $this->sendResponse($vehiclesTypes->toArray(), 'Vehicles Types retrieved successfully');
    }

    /**
     * Store a newly created VehiclesType in storage.
     * POST /vehiclesTypes
     *
     * @param CreateVehiclesTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclesTypeAPIRequest $request) {
        $input = $request->all();

        $vehiclesTypes = $this->vehiclesTypeRepository->create($input);

        return $this->sendResponse($vehiclesTypes->toArray(), 'Vehicles Type saved successfully');
    }

    /**
     * Display the specified VehiclesType.
     * GET|HEAD /vehiclesTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var VehiclesType $vehiclesType */
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            return $this->sendError('Vehicles Type not found');
        }

        return $this->sendResponse($vehiclesType->toArray(), 'Vehicles Type retrieved successfully');
    }

    /**
     * Update the specified VehiclesType in storage.
     * PUT/PATCH /vehiclesTypes/{id}
     *
     * @param  int $id
     * @param UpdateVehiclesTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclesTypeAPIRequest $request) {
        $input = $request->all();

        /** @var VehiclesType $vehiclesType */
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            return $this->sendError('Vehicles Type not found');
        }

        $vehiclesType = $this->vehiclesTypeRepository->update($input, $id);

        return $this->sendResponse($vehiclesType->toArray(), 'VehiclesType updated successfully');
    }

    /**
     * Remove the specified VehiclesType from storage.
     * DELETE /vehiclesTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var VehiclesType $vehiclesType */
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            return $this->sendError('Vehicles Type not found');
        }

        $vehiclesType->delete();

        return $this->sendResponse($id, 'Vehicles Type deleted successfully');
    }

}
