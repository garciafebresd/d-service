 <?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCalendarServiceRequest;
use App\Http\Requests\UpdateCalendarServiceRequest;
use App\Repositories\CalendarServiceRepository;
use App\Repositories\ClientsRepository;
use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CalendarServiceController extends AppBaseController {

    /** @var  CalendarServiceRepository */
    private $calendarServiceRepository;
    private $employeeRepository;
    private $clientsRepository;

    public function __construct(CalendarServiceRepository $calendarServiceRepo,EmployeeRepository $employeeRepo,ClientsRepository $clientsRepo) {
        $this->calendarServiceRepository = $calendarServiceRepo;
        $this->employeeRepository = $employeeRepo;
        $this->clientsRepository = $clientsRepo;
    }

    /**
     * Display a listing of the CalendarService.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->calendarServiceRepository->pushCriteria(new RequestCriteria($request));
        $calendarServices = $this->calendarServiceRepository->all();

        return view('calendar_services.index')
                        ->with('calendarServices', $calendarServices);
    }

    /**
     * Show the form for creating a new CalendarService.
     *
     * @return Response
     */
    public function create() {
        return view('calendar_services.create');
    }

    /**
     * Store a newly created CalendarService in storage.
     *
     * @param CreateCalendarServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateCalendarServiceRequest $request) {
        $input = $request->all();

        $calendarService = $this->calendarServiceRepository->create($input);

        Flash::success('Calendar Service saved successfully.');

        return redirect(route('calendarServices.index'));
    }

    /**
     * Display the specified CalendarService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            Flash::error('Calendar Service not found');

            return redirect(route('calendarServices.index'));
        }

        return view('calendar_services.show')->with('calendarService', $calendarService);
    }

    /**
     * Show the form for editing the specified CalendarService.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            Flash::error('Calendar Service not found');

            return redirect(route('calendarServices.index'));
        }

        return view('calendar_services.edit')->with('calendarService', $calendarService);
    }

    /**
     * Update the specified CalendarService in storage.
     *
     * @param  int              $id
     * @param UpdateCalendarServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalendarServiceRequest $request) {
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            Flash::error('Calendar Service not found');

            return redirect(route('calendarServices.index'));
        }

        $calendarService = $this->calendarServiceRepository->update($request->all(), $id);

        Flash::success('Calendar Service updated successfully.');

        return redirect(route('calendarServices.index'));
    }

    /**
     * Remove the specified CalendarService from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $calendarService = $this->calendarServiceRepository->findWithoutFail($id);

        if (empty($calendarService)) {
            Flash::error('Calendar Service not found');

            return redirect(route('calendarServices.index'));
        }

        $this->calendarServiceRepository->delete($id);

        Flash::success('Calendar Service deleted successfully.');

        return redirect(route('calendarServices.index'));
    }

}
