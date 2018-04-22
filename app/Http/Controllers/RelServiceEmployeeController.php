<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRelServiceEmployeeRequest;
use App\Http\Requests\UpdateRelServiceEmployeeRequest;
use App\Repositories\RelServiceEmployeeRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RelServiceEmployeeController extends AppBaseController {

    /** @var  RelServiceEmployeeRepository */
    private $relServiceEmployeeRepository;
    private $serviceRepository;
    private $employeeRepository;

    public function __construct(RelServiceEmployeeRepository $relServiceEmployeeRepo, ServiceRepository $serviceRepo, EmployeeRepository $employeeRepo) {
        $this->relServiceEmployeeRepository = $relServiceEmployeeRepo;
        $this->serviceRepository = $serviceRepo;
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the RelServiceEmployee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->relServiceEmployeeRepository->pushCriteria(new RequestCriteria($request));
        $relServiceEmployees = $this->relServiceEmployeeRepository->all();

        return view('rel_service_employees.index')
                        ->with('relServiceEmployees', $relServiceEmployees);
    }

    /**
     * Show the form for creating a new RelServiceEmployee.
     *
     * @return Response
     */
    public function create() {
        $service = $this->serviceRepository->all();
        $employee = $this->employeeRepository->all();

        return view('rel_service_employees.create')
                        ->with(array('service' => $service, 'employee' => $employee));
    }

    /**
     * Store a newly created RelServiceEmployee in storage.
     *
     * @param CreateRelServiceEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateRelServiceEmployeeRequest $request) {
        $input = $request->all();

        $relServiceEmployee = $this->relServiceEmployeeRepository->create($input);

        Flash::success('Rel Service Employee saved successfully.');

        return redirect(route('relServiceEmployees.index'));
    }

    /**
     * Display the specified RelServiceEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            Flash::error('Rel Service Employee not found');

            return redirect(route('relServiceEmployees.index'));
        }

        return view('rel_service_employees.show')->with('relServiceEmployee', $relServiceEmployee);
    }

    /**
     * Show the form for editing the specified RelServiceEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);
        if (empty($relServiceEmployee)) {
            Flash::error('Rel Service Employee not found');
            return redirect(route('relServiceEmployees.index'));
        }
        $service = $this->serviceRepository->all();
        $employee = $this->employeeRepository->all();
        
        return view('rel_service_employees.edit')->with(array('relServiceEmployee'=> $relServiceEmployee,'service' => $service, 'employee' => $employee));
    }

    /**
     * Update the specified RelServiceEmployee in storage.
     *
     * @param  int              $id
     * @param UpdateRelServiceEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelServiceEmployeeRequest $request) {
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            Flash::error('Rel Service Employee not found');

            return redirect(route('relServiceEmployees.index'));
        }

        $relServiceEmployee = $this->relServiceEmployeeRepository->update($request->all(), $id);

        Flash::success('Rel Service Employee updated successfully.');

        return redirect(route('relServiceEmployees.index'));
    }

    /**
     * Remove the specified RelServiceEmployee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $relServiceEmployee = $this->relServiceEmployeeRepository->findWithoutFail($id);

        if (empty($relServiceEmployee)) {
            Flash::error('Rel Service Employee not found');

            return redirect(route('relServiceEmployees.index'));
        }

        $this->relServiceEmployeeRepository->delete($id);

        Flash::success('Rel Service Employee deleted successfully.');

        return redirect(route('relServiceEmployees.index'));
    }

}
