<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;
use App\Repositories\EmployeeTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmployeeTypeController extends AppBaseController {

    /** @var  EmployeeTypeRepository */
    private $employeeTypeRepository;

    public function __construct(EmployeeTypeRepository $employeeTypeRepo) {
        $this->employeeTypeRepository = $employeeTypeRepo;
    }

    /**
     * Display a listing of the EmployeeType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->employeeTypeRepository->pushCriteria(new RequestCriteria($request));
        $employeeTypes = $this->employeeTypeRepository->all();

        return view('employee_types.index')
                        ->with('employeeTypes', $employeeTypes);
    }

    /**
     * Show the form for creating a new EmployeeType.
     *
     * @return Response
     */
    public function create() {
        return view('employee_types.create');
    }

    /**
     * Store a newly created EmployeeType in storage.
     *
     * @param CreateEmployeeTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeTypeRequest $request) {
        $input = $request->all();

        $employeeType = $this->employeeTypeRepository->create($input);

        Flash::success('Employee Type saved successfully.');

        return redirect(route('employeeTypes.index'));
    }

    /**
     * Display the specified EmployeeType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            Flash::error('Employee Type not found');

            return redirect(route('employeeTypes.index'));
        }

        return view('employee_types.show')->with('employeeType', $employeeType);
    }

    /**
     * Show the form for editing the specified EmployeeType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            Flash::error('Employee Type not found');

            return redirect(route('employeeTypes.index'));
        }

        return view('employee_types.edit')->with('employeeType', $employeeType);
    }

    /**
     * Update the specified EmployeeType in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeTypeRequest $request) {
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            Flash::error('Employee Type not found');

            return redirect(route('employeeTypes.index'));
        }

        $employeeType = $this->employeeTypeRepository->update($request->all(), $id);

        Flash::success('Employee Type updated successfully.');

        return redirect(route('employeeTypes.index'));
    }

    /**
     * Remove the specified EmployeeType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $employeeType = $this->employeeTypeRepository->findWithoutFail($id);

        if (empty($employeeType)) {
            Flash::error('Employee Type not found');

            return redirect(route('employeeTypes.index'));
        }

        $this->employeeTypeRepository->delete($id);

        Flash::success('Employee Type deleted successfully.');

        return redirect(route('employeeTypes.index'));
    }

}
