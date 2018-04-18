<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicePlanRequest;
use App\Http\Requests\UpdateServicePlanRequest;
use App\Repositories\ServicePlanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServicePlanController extends AppBaseController {

    /** @var  ServicePlanRepository */
    private $servicePlanRepository;

    public function __construct(ServicePlanRepository $servicePlanRepo) {
        $this->servicePlanRepository = $servicePlanRepo;
    }

    /**
     * Display a listing of the ServicePlan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->servicePlanRepository->pushCriteria(new RequestCriteria($request));
        $servicePlans = $this->servicePlanRepository->all();

        return view('service_plans.index')
                        ->with('servicePlans', $servicePlans);
    }

    /**
     * Show the form for creating a new ServicePlan.
     *
     * @return Response
     */
    public function create() {
        return view('service_plans.create');
    }

    /**
     * Store a newly created ServicePlan in storage.
     *
     * @param CreateServicePlanRequest $request
     *
     * @return Response
     */
    public function store(CreateServicePlanRequest $request) {
        $input = $request->all();

        $servicePlan = $this->servicePlanRepository->create($input);

        Flash::success('Service Plan saved successfully.');

        return redirect(route('servicePlans.index'));
    }

    /**
     * Display the specified ServicePlan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            Flash::error('Service Plan not found');

            return redirect(route('servicePlans.index'));
        }

        return view('service_plans.show')->with('servicePlan', $servicePlan);
    }

    /**
     * Show the form for editing the specified ServicePlan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            Flash::error('Service Plan not found');

            return redirect(route('servicePlans.index'));
        }

        return view('service_plans.edit')->with('servicePlan', $servicePlan);
    }

    /**
     * Update the specified ServicePlan in storage.
     *
     * @param  int              $id
     * @param UpdateServicePlanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicePlanRequest $request) {
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            Flash::error('Service Plan not found');

            return redirect(route('servicePlans.index'));
        }

        $servicePlan = $this->servicePlanRepository->update($request->all(), $id);

        Flash::success('Service Plan updated successfully.');

        return redirect(route('servicePlans.index'));
    }

    /**
     * Remove the specified ServicePlan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $servicePlan = $this->servicePlanRepository->findWithoutFail($id);

        if (empty($servicePlan)) {
            Flash::error('Service Plan not found');

            return redirect(route('servicePlans.index'));
        }

        $this->servicePlanRepository->delete($id);

        Flash::success('Service Plan deleted successfully.');

        return redirect(route('servicePlans.index'));
    }

}
