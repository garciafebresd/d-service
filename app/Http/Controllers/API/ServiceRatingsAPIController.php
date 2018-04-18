<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServiceRatingsAPIRequest;
use App\Http\Requests\API\UpdateServiceRatingsAPIRequest;
use App\Models\ServiceRatings;
use App\Repositories\ServiceRatingsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ServiceRatingsController
 * @package App\Http\Controllers\API
 */
class ServiceRatingsAPIController extends AppBaseController {

    /** @var  ServiceRatingsRepository */
    private $serviceRatingsRepository;

    public function __construct(ServiceRatingsRepository $serviceRatingsRepo) {
        $this->serviceRatingsRepository = $serviceRatingsRepo;
    }

    /**
     * Display a listing of the ServiceRatings.
     * GET|HEAD /serviceRatings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->serviceRatingsRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceRatingsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceRatings = $this->serviceRatingsRepository->all();

        return $this->sendResponse($serviceRatings->toArray(), 'Service Ratings retrieved successfully');
    }

    /**
     * Store a newly created ServiceRatings in storage.
     * POST /serviceRatings
     *
     * @param CreateServiceRatingsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRatingsAPIRequest $request) {
        $input = $request->all();

        $serviceRatings = $this->serviceRatingsRepository->create($input);

        return $this->sendResponse($serviceRatings->toArray(), 'Service Ratings saved successfully');
    }

    /**
     * Display the specified ServiceRatings.
     * GET|HEAD /serviceRatings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var ServiceRatings $serviceRatings */
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            return $this->sendError('Service Ratings not found');
        }

        return $this->sendResponse($serviceRatings->toArray(), 'Service Ratings retrieved successfully');
    }

    /**
     * Update the specified ServiceRatings in storage.
     * PUT/PATCH /serviceRatings/{id}
     *
     * @param  int $id
     * @param UpdateServiceRatingsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRatingsAPIRequest $request) {
        $input = $request->all();

        /** @var ServiceRatings $serviceRatings */
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            return $this->sendError('Service Ratings not found');
        }

        $serviceRatings = $this->serviceRatingsRepository->update($input, $id);

        return $this->sendResponse($serviceRatings->toArray(), 'ServiceRatings updated successfully');
    }

    /**
     * Remove the specified ServiceRatings from storage.
     * DELETE /serviceRatings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var ServiceRatings $serviceRatings */
        $serviceRatings = $this->serviceRatingsRepository->findWithoutFail($id);

        if (empty($serviceRatings)) {
            return $this->sendError('Service Ratings not found');
        }

        $serviceRatings->delete();

        return $this->sendResponse($id, 'Service Ratings deleted successfully');
    }

}
