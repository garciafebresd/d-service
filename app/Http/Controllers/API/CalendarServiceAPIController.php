<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCalendarServiceAPIRequest;
use App\Http\Requests\API\UpdateCalendarServiceAPIRequest;
use App\Models\CalendarService;
use App\Repositories\CalendarServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CalendarServiceController
 * @package App\Http\Controllers\API
 */
class CalendarServiceAPIController extends AppBaseController {

    /** @var  CalendarServiceRepository */
    private $calendarServiceRepository;

    public function __construct(CalendarServiceRepository $calendarServiceRepo) {
        $this->calendarServiceRepository = $calendarServiceRepo;
    }

    /**
     * Display a listing of the CalendarService.
     * GET|HEAD /calendarServices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->calendarServiceRepository->pushCriteria(new RequestCriteria($request));
        $this->calendarServiceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $calendarServices = $this->calendarServiceRepository->all();

        return $this->sendResponse($calendarServices->toArray(), 'Calendar Services retrieved successfully');
    }

    /**
     * Store a newly created CalendarService in storage.
     * POST /calendarServices
     *
     * @param CreateCalendarServiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCalendarServiceAPIRequest $request) {
        $input = $request->all();

        $calendarServices = $this->calendarServiceRepository->create($input);

        return $this->sendResponse($calendarServices->toArray(), 'Calendar Service saved successfully');
    }

    /**
     * Display the specified CalendarService.
     * GET|HEAD /calendarServices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var CalendarService $calendarService */
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            return $this->sendError('Calendar Service not found');
        }

        return $this->sendResponse($calendarService->toArray(), 'Calendar Service retrieved successfully');
    }

    /**
     * Update the specified CalendarService in storage.
     * PUT/PATCH /calendarServices/{id}
     *
     * @param  int $id
     * @param UpdateCalendarServiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalendarServiceAPIRequest $request) {
        $input = $request->all();

        /** @var CalendarService $calendarService */
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            return $this->sendError('Calendar Service not found');
        }

        $calendarService = $this->calendarServiceRepository->update($input, $id);

        return $this->sendResponse($calendarService->toArray(), 'CalendarService updated successfully');
    }

    /**
     * Remove the specified CalendarService from storage.
     * DELETE /calendarServices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var CalendarService $calendarService */
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            return $this->sendError('Calendar Service not found');
        }

        $calendarService->delete();

        return $this->sendResponse($id, 'Calendar Service deleted successfully');
    }

}
