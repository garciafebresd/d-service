<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSystemLogAPIRequest;
use App\Http\Requests\API\UpdateSystemLogAPIRequest;
use App\Models\SystemLog;
use App\Repositories\SystemLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SystemLogController
 * @package App\Http\Controllers\API
 */
class SystemLogAPIController extends AppBaseController {

    /** @var  SystemLogRepository */
    private $systemLogRepository;

    public function __construct(SystemLogRepository $systemLogRepo) {
        $this->systemLogRepository = $systemLogRepo;
    }

    /**
     * Display a listing of the SystemLog.
     * GET|HEAD /systemLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->systemLogRepository->pushCriteria(new RequestCriteria($request));
        $this->systemLogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $systemLogs = $this->systemLogRepository->all();

        return $this->sendResponse($systemLogs->toArray(), 'System Logs retrieved successfully');
    }

    /**
     * Store a newly created SystemLog in storage.
     * POST /systemLogs
     *
     * @param CreateSystemLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSystemLogAPIRequest $request) {
        $input = $request->all();

        $systemLogs = $this->systemLogRepository->create($input);

        return $this->sendResponse($systemLogs->toArray(), 'System Log saved successfully');
    }

    /**
     * Display the specified SystemLog.
     * GET|HEAD /systemLogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var SystemLog $systemLog */
        $systemLog = $this->systemLogRepository->findWithoutFail($id);

        if (empty($systemLog)) {
            return $this->sendError('System Log not found');
        }

        return $this->sendResponse($systemLog->toArray(), 'System Log retrieved successfully');
    }

    /**
     * Update the specified SystemLog in storage.
     * PUT/PATCH /systemLogs/{id}
     *
     * @param  int $id
     * @param UpdateSystemLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSystemLogAPIRequest $request) {
        $input = $request->all();

        /** @var SystemLog $systemLog */
        $systemLog = $this->systemLogRepository->findWithoutFail($id);

        if (empty($systemLog)) {
            return $this->sendError('System Log not found');
        }

        $systemLog = $this->systemLogRepository->update($input, $id);

        return $this->sendResponse($systemLog->toArray(), 'SystemLog updated successfully');
    }

    /**
     * Remove the specified SystemLog from storage.
     * DELETE /systemLogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var SystemLog $systemLog */
        $systemLog = $this->systemLogRepository->findWithoutFail($id);

        if (empty($systemLog)) {
            return $this->sendError('System Log not found');
        }

        $systemLog->delete();

        return $this->sendResponse($id, 'System Log deleted successfully');
    }

}
