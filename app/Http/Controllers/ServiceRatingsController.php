<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRatingsRequest;
use App\Http\Requests\UpdateServiceRatingsRequest;
use App\Repositories\ServiceRatingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceRatingsController extends AppBaseController {

    /** @var  ServiceRatingsRepository */
    private $serviceRatingsRepository;

    public function __construct(ServiceRatingsRepository $serviceRatingsRepo) {
        $this->serviceRatingsRepository = $serviceRatingsRepo;
    }

    /**
     * Display a listing of the ServiceRatings.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->serviceRatingsRepository->pushCriteria(new RequestCriteria($request));
        $serviceRatings = $this->serviceRatingsRepository->all();

        return view('service_ratings.index')
                        ->with('serviceRatings', $serviceRatings);
    }

    /**
     * Show the form for creating a new ServiceRatings.
     *
     * @return Response
     */
    public function create() {
        return view('service_ratings.create');
    }

    /**
     * Store a newly created ServiceRatings in storage.
     *
     * @param CreateServiceRatingsRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRatingsRequest $request) {
        $input = $request->all();

        $serviceRatings = $this->serviceRatingsRepository->create($input);

        Flash::success('Service Ratings saved successfully.');

        return redirect(route('serviceRatings.index'));
    }

    /**
     * Display the specified ServiceRatings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            Flash::error('Service Ratings not found');

            return redirect(route('serviceRatings.index'));
        }

        return view('service_ratings.show')->with('serviceRatings', $serviceRatings);
    }

    /**
     * Show the form for editing the specified ServiceRatings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            Flash::error('Service Ratings not found');

            return redirect(route('serviceRatings.index'));
        }

        return view('service_ratings.edit')->with('serviceRatings', $serviceRatings);
    }

    /**
     * Update the specified ServiceRatings in storage.
     *
     * @param  int              $id
     * @param UpdateServiceRatingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRatingsRequest $request) {
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            Flash::error('Service Ratings not found');

            return redirect(route('serviceRatings.index'));
        }

        $serviceRatings = $this->serviceRatingsRepository->update($request->all(), $id);

        Flash::success('Service Ratings updated successfully.');

        return redirect(route('serviceRatings.index'));
    }

    /**
     * Remove the specified ServiceRatings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            Flash::error('Service Ratings not found');

            return redirect(route('serviceRatings.index'));
        }

        $this->serviceRatingsRepository->delete($id);

        Flash::success('Service Ratings deleted successfully.');

        return redirect(route('serviceRatings.index'));
    }

}
