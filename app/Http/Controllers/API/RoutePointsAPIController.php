<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoutePointsAPIRequest;
use App\Http\Requests\API\UpdateRoutePointsAPIRequest;
use App\Models\RoutePoints;
use App\Repositories\RoutePointsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoutePointsController
 * @package App\Http\Controllers\API
 */
class RoutePointsAPIController extends AppBaseController {

    /** @var  RoutePointsRepository */
    private $routePointsRepository;

    public function __construct(RoutePointsRepository $routePointsRepo) {
        $this->routePointsRepository = $routePointsRepo;
    }

    /**
     * Display a listing of the RoutePoints.
     * GET|HEAD /routePoints
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->routePointsRepository->pushCriteria(new RequestCriteria($request));
        $this->routePointsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $routePoints = $this->routePointsRepository->all();

        return $this->sendResponse($routePoints->toArray(), 'Route Points retrieved successfully');
    }

    /**
     * Store a newly created RoutePoints in storage.
     * POST /routePoints
     *
     * @param CreateRoutePointsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoutePointsAPIRequest $request) {
        $input = $request->all();

        $routePoints = $this->routePointsRepository->create($input);

        return $this->sendResponse($routePoints->toArray(), 'Route Points saved successfully');
    }

    /**
     * Display the specified RoutePoints.
     * GET|HEAD /routePoints/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var RoutePoints $routePoints */
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            return $this->sendError('Route Points not found');
        }

        return $this->sendResponse($routePoints->toArray(), 'Route Points retrieved successfully');
    }

    /**
     * Update the specified RoutePoints in storage.
     * PUT/PATCH /routePoints/{id}
     *
     * @param  int $id
     * @param UpdateRoutePointsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoutePointsAPIRequest $request) {
        $input = $request->all();

        /** @var RoutePoints $routePoints */
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            return $this->sendError('Route Points not found');
        }

        $routePoints = $this->routePointsRepository->update($input, $id);

        return $this->sendResponse($routePoints->toArray(), 'RoutePoints updated successfully');
    }

    /**
     * Remove the specified RoutePoints from storage.
     * DELETE /routePoints/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var RoutePoints $routePoints */
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            return $this->sendError('Route Points not found');
        }

        $routePoints->delete();

        return $this->sendResponse($id, 'Route Points deleted successfully');
    }

}
