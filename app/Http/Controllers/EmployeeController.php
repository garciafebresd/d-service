<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;
use App\Repositories\EmployeeTypeRepository;
use App\Repositories\CompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmployeeController extends AppBaseController {

    /** @var  EmployeeRepository */
    private $employeeRepository;
    private $employeeTypeRepository;
    private $companyRepository;

    public function __construct(EmployeeRepository $employeeRepo, EmployeeTypeRepository $employeeTypeRepo, CompanyRepository $companyRepo) {
        $this->employeeRepository = $employeeRepo;
        $this->employeeTypeRepository = $employeeTypeRepo;
        $this->companyRepository = $companyRepo;
        
    }

    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->employeeRepository->pushCriteria(new RequestCriteria($request));
        $employees = $this->employeeRepository->all();

        return view('employees.index')
                        ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create() {        
        $employeeType = $this->employeeTypeRepository->all();
        $company = $this->companyRepository->all();
        return view('employees.create')
                        ->with(array('employeeType'=>$employeeType,'company'=>$company));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request) {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');
            return redirect(route('employees.index'));
        }
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');
            return redirect(route('employees.index'));
        }
        $employeeType = $this->employeeTypeRepository->all();
        $company = $this->companyRepository->all();
        
        return view('employees.edit')->with(array('employee'=>$employee,'employeeType'=>$employeeType,'company'=>$company));
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request) {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee = $this->employeeRepository->update($request->all(), $id);

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }

}
