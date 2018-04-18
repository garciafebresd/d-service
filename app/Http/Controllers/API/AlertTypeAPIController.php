<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlertTypeAPIRequest;
use App\Http\Requests\API\UpdateAlertTypeAPIRequest;
use App\Models\AlertType;
use App\Repositories\AlertTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AlertTypeController
 * @package App\Http\Controllers\API
 */
class AlertTypeAPIController extends AppBaseController {

    /** @var  AlertTypeRepository */
    private $alertTypeRepository;

    public function __construct(AlertTypeRepository $alertTypeRepo) {
        $this->alertTypeRepository = $alertTypeRepo;
    }

    /**
     * Display a listing of the AlertType.
     * GET|HEAD /alertTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->alertTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->alertTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $alertTypes = $this->alertTypeRepository->all();

        return $this->sendResponse($alertTypes->toArray(), 'Alert Types retrieved successfully');
    }

    /**
     * Store a newly created AlertType in storage.
     * POST /alertTypes
     *
     * @param CreateAlertTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlertTypeAPIRequest $request) {
        $input = $request->all();

        $alertTypes = $this->alertTypeRepository->create($input);

        return $this->sendResponse($alertTypes->toArray(), 'Alert Type saved successfully');
    }

    /**
     * Display the specified AlertType.
     * GET|HEAD /alertTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var AlertType $alertType */
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            return $this->sendError('Alert Type not found');
        }

        return $this->sendResponse($alertType->toArray(), 'Alert Type retrieved successfully');
    }

    /**
     * Update the specified AlertType in storage.
     * PUT/PATCH /alertTypes/{id}
     *
     * @param  int $id
     * @param UpdateAlertTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlertTypeAPIRequest $request) {
        $input = $request->all();

        /** @var AlertType $alertType */
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            return $this->sendError('Alert Type not found');
        }

        $alertType = $this->alertTypeRepository->update($input, $id);

        return $this->sendResponse($alertType->toArray(), 'AlertType updated successfully');
    }

    /**
     * Remove the specified AlertType from storage.
     * DELETE /alertTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var AlertType $alertType */
        $alertType = $this->alertTypeRepository->findWithoutFail($id);

        if (empty($alertType)) {
            return $this->sendError('Alert Type not found');
        }

        $alertType->delete();

        return $this->sendResponse($id, 'Alert Type deleted successfully');
    }

}
