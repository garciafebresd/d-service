<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployeeTypeAPIRequest;
use App\Http\Requests\API\UpdateEmployeeTypeAPIRequest;
use App\Models\EmployeeType;
use App\Repositories\EmployeeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EmployeeTypeController
 * @package App\Http\Controllers\API
 */
class EmployeeTypeAPIController extends AppBaseController {

    /** @var  EmployeeTypeRepository */
    private $employeeTypeRepository;

    public function __construct(EmployeeTypeRepository $employeeTypeRepo) {
        $this->employeeTypeRepository = $employeeTypeRepo;
    }

    /**
     * Display a listing of the EmployeeType.
     * GET|HEAD /employeeTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->employeeTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->employeeTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $employeeTypes = $this->employeeTypeRepository->all();

        return $this->sendResponse($employeeTypes->toArray(), 'Employee Types retrieved successfully');
    }

    /**
     * Store a newly created EmployeeType in storage.
     * POST /employeeTypes
     *
     * @param CreateEmployeeTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeTypeAPIRequest $request) {
        $input = $request->all();

        $employeeTypes = $this->employeeTypeRepository->create($input);

        return $this->sendResponse($employeeTypes->toArray(), 'Employee Type saved successfully');
    }

    /**
     * Display the specified EmployeeType.
     * GET|HEAD /employeeTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var EmployeeType $employeeType */
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            return $this->sendError('Employee Type not found');
        }

        return $this->sendResponse($employeeType->toArray(), 'Employee Type retrieved successfully');
    }

    /**
     * Update the specified EmployeeType in storage.
     * PUT/PATCH /employeeTypes/{id}
     *
     * @param  int $id
     * @param UpdateEmployeeTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeTypeAPIRequest $request) {
        $input = $request->all();

        /** @var EmployeeType $employeeType */
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            return $this->sendError('Employee Type not found');
        }

        $employeeType = $this->employeeTypeRepository->update($input, $id);

        return $this->sendResponse($employeeType->toArray(), 'EmployeeType updated successfully');
    }

    /**
     * Remove the specified EmployeeType from storage.
     * DELETE /employeeTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var EmployeeType $employeeType */
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            return $this->sendError('Employee Type not found');
        }

        $employeeType->delete();

        return $this->sendResponse($id, 'Employee Type deleted successfully');
    }

}
