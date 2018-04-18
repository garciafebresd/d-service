<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlertTypeRequest;
use App\Http\Requests\UpdateAlertTypeRequest;
use App\Repositories\AlertTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlertTypeController extends AppBaseController {

    /** @var  AlertTypeRepository */
    private $alertTypeRepository;

    public function __construct(AlertTypeRepository $alertTypeRepo) {
        $this->alertTypeRepository = $alertTypeRepo;
    }

    /**
     * Display a listing of the AlertType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->alertTypeRepository->pushCriteria(new RequestCriteria($request));
        $alertTypes = $this->alertTypeRepository->all();

        return view('alert_types.index')
                        ->with('alertTypes', $alertTypes);
    }

    /**
     * Show the form for creating a new AlertType.
     *
     * @return Response
     */
    public function create() {
        return view('alert_types.create');
    }

    /**
     * Store a newly created AlertType in storage.
     *
     * @param CreateAlertTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateAlertTypeRequest $request) {
        $input = $request->all();

        $alertType = $this->alertTypeRepository->create($input);

        Flash::success('Alert Type saved successfully.');

        return redirect(route('alertTypes.index'));
    }

    /**
     * Display the specified AlertType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            Flash::error('Alert Type not found');

            return redirect(route('alertTypes.index'));
        }

        return view('alert_types.show')->with('alertType', $alertType);
    }

    /**
     * Show the form for editing the specified AlertType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            Flash::error('Alert Type not found');

            return redirect(route('alertTypes.index'));
        }

        return view('alert_types.edit')->with('alertType', $alertType);
    }

    /**
     * Update the specified AlertType in storage.
     *
     * @param  int              $id
     * @param UpdateAlertTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlertTypeRequest $request) {
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            Flash::error('Alert Type not found');

            return redirect(route('alertTypes.index'));
        }

        $alertType = $this->alertTypeRepository->update($request->all(), $id);

        Flash::success('Alert Type updated successfully.');

        return redirect(route('alertTypes.index'));
    }

    /**
     * Remove the specified AlertType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            Flash::error('Alert Type not found');

            return redirect(route('alertTypes.index'));
        }

        $this->alertTypeRepository->delete($id);

        Flash::success('Alert Type deleted successfully.');

        return redirect(route('alertTypes.index'));
    }

}
