<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlertsAPIRequest;
use App\Http\Requests\API\UpdateAlertsAPIRequest;
use App\Models\Alerts;
use App\Repositories\AlertsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AlertsController
 * @package App\Http\Controllers\API
 */
class AlertsAPIController extends AppBaseController {

    /** @var  AlertsRepository */
    private $alertsRepository;

    public function __construct(AlertsRepository $alertsRepo) {
        $this->alertsRepository = $alertsRepo;
    }

    /**
     * Display a listing of the Alerts.
     * GET|HEAD /alerts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->alertsRepository->pushCriteria(new RequestCriteria($request));
        $this->alertsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $alerts = $this->alertsRepository->all();

        return $this->sendResponse($alerts->toArray(), 'Alerts retrieved successfully');
    }

    /**
     * Store a newly created Alerts in storage.
     * POST /alerts
     *
     * @param CreateAlertsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlertsAPIRequest $request) {
        $input = $request->all();

        $alerts = $this->alertsRepository->create($input);

        return $this->sendResponse($alerts->toArray(), 'Alerts saved successfully');
    }

    /**
     * Display the specified Alerts.
     * GET|HEAD /alerts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Alerts $alerts */
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            return $this->sendError('Alerts not found');
        }

        return $this->sendResponse($alerts->toArray(), 'Alerts retrieved successfully');
    }

    /**
     * Update the specified Alerts in storage.
     * PUT/PATCH /alerts/{id}
     *
     * @param  int $id
     * @param UpdateAlertsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlertsAPIRequest $request) {
        $input = $request->all();

        /** @var Alerts $alerts */
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            return $this->sendError('Alerts not found');
        }

        $alerts = $this->alertsRepository->update($input, $id);

        return $this->sendResponse($alerts->toArray(), 'Alerts updated successfully');
    }

    /**
     * Remove the specified Alerts from storage.
     * DELETE /alerts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Alerts $alerts */
        $alerts = $this->alertsRepository->findWithoutFail($id);

        if (empty($alerts)) {
            return $this->sendError('Alerts not found');
        }

        $alerts->delete();

        return $this->sendResponse($id, 'Alerts deleted successfully');
    }

}
