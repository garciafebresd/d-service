<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogTypeAPIRequest;
use App\Http\Requests\API\UpdateLogTypeAPIRequest;
use App\Models\LogType;
use App\Repositories\LogTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LogTypeController
 * @package App\Http\Controllers\API
 */
class LogTypeAPIController extends AppBaseController {

    /** @var  LogTypeRepository */
    private $logTypeRepository;

    public function __construct(LogTypeRepository $logTypeRepo) {
        $this->logTypeRepository = $logTypeRepo;
    }

    /**
     * Display a listing of the LogType.
     * GET|HEAD /logTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->logTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->logTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $logTypes = $this->logTypeRepository->all();

        return $this->sendResponse($logTypes->toArray(), 'Log Types retrieved successfully');
    }

    /**
     * Store a newly created LogType in storage.
     * POST /logTypes
     *
     * @param CreateLogTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogTypeAPIRequest $request) {
        $input = $request->all();

        $logTypes = $this->logTypeRepository->create($input);

        return $this->sendResponse($logTypes->toArray(), 'Log Type saved successfully');
    }

    /**
     * Display the specified LogType.
     * GET|HEAD /logTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var LogType $logType */
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            return $this->sendError('Log Type not found');
        }

        return $this->sendResponse($logType->toArray(), 'Log Type retrieved successfully');
    }

    /**
     * Update the specified LogType in storage.
     * PUT/PATCH /logTypes/{id}
     *
     * @param  int $id
     * @param UpdateLogTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogTypeAPIRequest $request) {
        $input = $request->all();

        /** @var LogType $logType */
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            return $this->sendError('Log Type not found');
        }

        $logType = $this->logTypeRepository->update($input, $id);

        return $this->sendResponse($logType->toArray(), 'LogType updated successfully');
    }

    /**
     * Remove the specified LogType from storage.
     * DELETE /logTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var LogType $logType */
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            return $this->sendError('Log Type not found');
        }

        $logType->delete();

        return $this->sendResponse($id, 'Log Type deleted successfully');
    }

}
