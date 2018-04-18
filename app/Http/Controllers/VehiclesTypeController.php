<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehiclesTypeRequest;
use App\Http\Requests\UpdateVehiclesTypeRequest;
use App\Repositories\VehiclesTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VehiclesTypeController extends AppBaseController {

    /** @var  VehiclesTypeRepository */
    private $vehiclesTypeRepository;

    public function __construct(VehiclesTypeRepository $vehiclesTypeRepo) {
        $this->vehiclesTypeRepository = $vehiclesTypeRepo;
    }

    /**
     * Display a listing of the VehiclesType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->vehiclesTypeRepository->pushCriteria(new RequestCriteria($request));
        $vehiclesTypes = $this->vehiclesTypeRepository->all();

        return view('vehicles_types.index')
                        ->with('vehiclesTypes', $vehiclesTypes);
    }

    /**
     * Show the form for creating a new VehiclesType.
     *
     * @return Response
     */
    public function create() {
        return view('vehicles_types.create');
    }

    /**
     * Store a newly created VehiclesType in storage.
     *
     * @param CreateVehiclesTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclesTypeRequest $request) {
        $input = $request->all();

        $vehiclesType = $this->vehiclesTypeRepository->create($input);

        Flash::success('Vehicles Type saved successfully.');

        return redirect(route('vehiclesTypes.index'));
    }

    /**
     * Display the specified VehiclesType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            Flash::error('Vehicles Type not found');

            return redirect(route('vehiclesTypes.index'));
        }

        return view('vehicles_types.show')->with('vehiclesType', $vehiclesType);
    }

    /**
     * Show the form for editing the specified VehiclesType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            Flash::error('Vehicles Type not found');

            return redirect(route('vehiclesTypes.index'));
        }

        return view('vehicles_types.edit')->with('vehiclesType', $vehiclesType);
    }

    /**
     * Update the specified VehiclesType in storage.
     *
     * @param  int              $id
     * @param UpdateVehiclesTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclesTypeRequest $request) {
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            Flash::error('Vehicles Type not found');

            return redirect(route('vehiclesTypes.index'));
        }

        $vehiclesType = $this->vehiclesTypeRepository->update($request->all(), $id);

        Flash::success('Vehicles Type updated successfully.');

        return redirect(route('vehiclesTypes.index'));
    }

    /**
     * Remove the specified VehiclesType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $vehiclesType = $this->vehiclesTypeRepository->findWithoutFail($id);

        if (empty($vehiclesType)) {
            Flash::error('Vehicles Type not found');

            return redirect(route('vehiclesTypes.index'));
        }

        $this->vehiclesTypeRepository->delete($id);

        Flash::success('Vehicles Type deleted successfully.');

        return redirect(route('vehiclesTypes.index'));
    }

}
