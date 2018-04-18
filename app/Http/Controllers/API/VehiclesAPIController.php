<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehiclesAPIRequest;
use App\Http\Requests\API\UpdateVehiclesAPIRequest;
use App\Models\Vehicles;
use App\Repositories\VehiclesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VehiclesController
 * @package App\Http\Controllers\API
 */
class VehiclesAPIController extends AppBaseController {

    /** @var  VehiclesRepository */
    private $vehiclesRepository;

    public function __construct(VehiclesRepository $vehiclesRepo) {
        $this->vehiclesRepository = $vehiclesRepo;
    }

    /**
     * Display a listing of the Vehicles.
     * GET|HEAD /vehicles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->vehiclesRepository->pushCriteria(new RequestCriteria($request));
        $this->vehiclesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vehicles = $this->vehiclesRepository->all();

        return $this->sendResponse($vehicles->toArray(), 'Vehicles retrieved successfully');
    }

    /**
     * Store a newly created Vehicles in storage.
     * POST /vehicles
     *
     * @param CreateVehiclesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclesAPIRequest $request) {
        $input = $request->all();

        $vehicles = $this->vehiclesRepository->create($input);

        return $this->sendResponse($vehicles->toArray(), 'Vehicles saved successfully');
    }

    /**
     * Display the specified Vehicles.
     * GET|HEAD /vehicles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Vehicles $vehicles */
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            return $this->sendError('Vehicles not found');
        }

        return $this->sendResponse($vehicles->toArray(), 'Vehicles retrieved successfully');
    }

    /**
     * Update the specified Vehicles in storage.
     * PUT/PATCH /vehicles/{id}
     *
     * @param  int $id
     * @param UpdateVehiclesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclesAPIRequest $request) {
        $input = $request->all();

        /** @var Vehicles $vehicles */
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            return $this->sendError('Vehicles not found');
        }

        $vehicles = $this->vehiclesRepository->update($input, $id);

        return $this->sendResponse($vehicles->toArray(), 'Vehicles updated successfully');
    }

    /**
     * Remove the specified Vehicles from storage.
     * DELETE /vehicles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Vehicles $vehicles */
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            return $this->sendError('Vehicles not found');
        }

        $vehicles->delete();

        return $this->sendResponse($id, 'Vehicles deleted successfully');
    }

}
