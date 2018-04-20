<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlertsRequest;
use App\Http\Requests\UpdateAlertsRequest;
use App\Repositories\AlertsRepository;
use App\Repositories\AlertTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlertsController extends AppBaseController {

    /** @var  AlertsRepository */
    private $alertsRepository;
    private $alertTypeRepository;

    public function __construct(AlertsRepository $alertsRepo,AlertTypeRepository $alertTypeRepo) {
        $this->alertsRepository = $alertsRepo;
        $this->alertTypeRepository = $alertTypeRepo;
    }

    /**
     * Display a listing of the Alerts.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->alertsRepository->pushCriteria(new RequestCriteria($request));
        $alerts = $this->alertsRepository->all();

        return view('alerts.index')
                        ->with('alerts', $alerts);
    }

    /**
     * Show the form for creating a new Alerts.
     *
     * @return Response
     */
    public function create() {
        $alertType = $this->alertTypeRepository->all();
        return view('alerts.create')->with('alertType', $alertType);
    }

    /**
     * Store a newly created Alerts in storage.
     *
     * @param CreateAlertsRequest $request
     *
     * @return Response
     */
    public function store(CreateAlertsRequest $request) {
        $input = $request->all();

        $alerts = $this->alertsRepository->create($input);

        Flash::success('Alerts saved successfully.');

        return redirect(route('alerts.index'));
    }

    /**
     * Display the specified Alerts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            Flash::error('Alerts not found');

            return redirect(route('alerts.index'));
        }

        return view('alerts.show')->with('alerts', $alerts);
    }

    /**
     * Show the form for editing the specified Alerts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $alerts = $this->alertsRepository->findWithoutFail($id);
        if (empty($alerts)) {
            Flash::error('Alerts not found');
            return redirect(route('alerts.index'));
        }
        $alertType = $this->alertTypeRepository->all();
        return view('alerts.edit')->with(array('alerts'=> $alerts,'alertType'=>$alertType));
    }

    /**
     * Update the specified Alerts in storage.
     *
     * @param  int              $id
     * @param UpdateAlertsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlertsRequest $request) {
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            Flash::error('Alerts not found');

            return redirect(route('alerts.index'));
        }

        $alerts = $this->alertsRepository->update($request->all(), $id);

        Flash::success('Alerts updated successfully.');

        return redirect(route('alerts.index'));
    }

    /**
     * Remove the specified Alerts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            Flash::error('Alerts not found');

            return redirect(route('alerts.index'));
        }

        $this->alertsRepository->delete($id);

        Flash::success('Alerts deleted successfully.');

        return redirect(route('alerts.index'));
    }

}
