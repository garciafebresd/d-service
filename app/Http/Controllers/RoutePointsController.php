<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoutePointsRequest;
use App\Http\Requests\UpdateRoutePointsRequest;
use App\Repositories\RoutePointsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoutePointsController extends AppBaseController {

    /** @var  RoutePointsRepository */
    private $routePointsRepository;

    public function __construct(RoutePointsRepository $routePointsRepo) {
        $this->routePointsRepository = $routePointsRepo;
    }

    /**
     * Display a listing of the RoutePoints.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->routePointsRepository->pushCriteria(new RequestCriteria($request));
        $routePoints = $this->routePointsRepository->all();

        return view('route_points.index')
                        ->with('routePoints', $routePoints);
    }

    /**
     * Show the form for creating a new RoutePoints.
     *
     * @return Response
     */
    public function create() {
        return view('route_points.create');
    }

    /**
     * Store a newly created RoutePoints in storage.
     *
     * @param CreateRoutePointsRequest $request
     *
     * @return Response
     */
    public function store(CreateRoutePointsRequest $request) {
        $input = $request->all();

        $routePoints = $this->routePointsRepository->create($input);

        Flash::success('Route Points saved successfully.');

        return redirect(route('routePoints.index'));
    }

    /**
     * Display the specified RoutePoints.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            Flash::error('Route Points not found');

            return redirect(route('routePoints.index'));
        }

        return view('route_points.show')->with('routePoints', $routePoints);
    }

    /**
     * Show the form for editing the specified RoutePoints.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            Flash::error('Route Points not found');

            return redirect(route('routePoints.index'));
        }

        return view('route_points.edit')->with('routePoints', $routePoints);
    }

    /**
     * Update the specified RoutePoints in storage.
     *
     * @param  int              $id
     * @param UpdateRoutePointsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoutePointsRequest $request) {
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            Flash::error('Route Points not found');

            return redirect(route('routePoints.index'));
        }

        $routePoints = $this->routePointsRepository->update($request->all(), $id);

        Flash::success('Route Points updated successfully.');

        return redirect(route('routePoints.index'));
    }

    /**
     * Remove the specified RoutePoints from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $routePoints = $this->routePointsRepository->findWithoutFail($id);

        if (empty($routePoints)) {
            Flash::error('Route Points not found');

            return redirect(route('routePoints.index'));
        }

        $this->routePointsRepository->delete($id);

        Flash::success('Route Points deleted successfully.');

        return redirect(route('routePoints.index'));
    }

}
