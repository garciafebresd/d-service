<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRelServiceEmployeeAPIRequest;
use App\Http\Requests\API\UpdateRelServiceEmployeeAPIRequest;
use App\Models\RelServiceEmployee;
use App\Repositories\RelServiceEmployeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RelServiceEmployeeController
 * @package App\Http\Controllers\API
 */
class RelServiceEmployeeAPIController extends AppBaseController {

    /** @var  RelServiceEmployeeRepository */
    private $relServiceEmployeeRepository;

    public function __construct(RelServiceEmployeeRepository $relServiceEmployeeRepo) {
        $this->relServiceEmployeeRepository = $relServiceEmployeeRepo;
    }

    /**
     * Display a listing of the RelServiceEmployee.
     * GET|HEAD /relServiceEmployees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->relServiceEmployeeRepository->pushCriteria(new RequestCriteria($request));
        $this->relServiceEmployeeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $relServiceEmployees = $this->relServiceEmployeeRepository->all();

        return $this->sendResponse($relServiceEmployees->toArray(), 'Rel Service Employees retrieved successfully');
    }

    /**
     * Store a newly created RelServiceEmployee in storage.
     * POST /relServiceEmployees
     *
     * @param CreateRelServiceEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRelServiceEmployeeAPIRequest $request) {
        $input = $request->all();

        $relServiceEmployees = $this->relServiceEmployeeRepository->create($input);

        return $this->sendResponse($relServiceEmployees->toArray(), 'Rel Service Employee saved successfully');
    }

    /**
     * Display the specified RelServiceEmployee.
     * GET|HEAD /relServiceEmployees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var RelServiceEmployee $relServiceEmployee */
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            return $this->sendError('Rel Service Employee not found');
        }

        return $this->sendResponse($relServiceEmployee->toArray(), 'Rel Service Employee retrieved successfully');
    }

    /**
     * Update the specified RelServiceEmployee in storage.
     * PUT/PATCH /relServiceEmployees/{id}
     *
     * @param  int $id
     * @param UpdateRelServiceEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelServiceEmployeeAPIRequest $request) {
        $input = $request->all();

        /** @var RelServiceEmployee $relServiceEmployee */
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            return $this->sendError('Rel Service Employee not found');
        }

        $relServiceEmployee = $this->relServiceEmployeeRepository->update($input, $id);

        return $this->sendResponse($relServiceEmployee->toArray(), 'RelServiceEmployee updated successfully');
    }

    /**
     * Remove the specified RelServiceEmployee from storage.
     * DELETE /relServiceEmployees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var RelServiceEmployee $relServiceEmployee */
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            return $this->sendError('Rel Service Employee not found');
        }

        $relServiceEmployee->delete();

        return $this->sendResponse($id, 'Rel Service Employee deleted successfully');
    }

}
