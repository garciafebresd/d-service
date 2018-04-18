<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogTypeRequest;
use App\Http\Requests\UpdateLogTypeRequest;
use App\Repositories\LogTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogTypeController extends AppBaseController {

    /** @var  LogTypeRepository */
    private $logTypeRepository;

    public function __construct(LogTypeRepository $logTypeRepo) {
        $this->logTypeRepository = $logTypeRepo;
    }

    /**
     * Display a listing of the LogType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->logTypeRepository->pushCriteria(new RequestCriteria($request));
        $logTypes = $this->logTypeRepository->all();

        return view('log_types.index')
                        ->with('logTypes', $logTypes);
    }

    /**
     * Show the form for creating a new LogType.
     *
     * @return Response
     */
    public function create() {
        return view('log_types.create');
    }

    /**
     * Store a newly created LogType in storage.
     *
     * @param CreateLogTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateLogTypeRequest $request) {
        $input = $request->all();

        $logType = $this->logTypeRepository->create($input);

        Flash::success('Log Type saved successfully.');

        return redirect(route('logTypes.index'));
    }

    /**
     * Display the specified LogType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            Flash::error('Log Type not found');

            return redirect(route('logTypes.index'));
        }

        return view('log_types.show')->with('logType', $logType);
    }

    /**
     * Show the form for editing the specified LogType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            Flash::error('Log Type not found');

            return redirect(route('logTypes.index'));
        }

        return view('log_types.edit')->with('logType', $logType);
    }

    /**
     * Update the specified LogType in storage.
     *
     * @param  int              $id
     * @param UpdateLogTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogTypeRequest $request) {
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            Flash::error('Log Type not found');

            return redirect(route('logTypes.index'));
        }

        $logType = $this->logTypeRepository->update($request->all(), $id);

        Flash::success('Log Type updated successfully.');

        return redirect(route('logTypes.index'));
    }

    /**
     * Remove the specified LogType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $logType = $this->logTypeRepository->findWithoutFail($id);

        if (empty($logType)) {
            Flash::error('Log Type not found');

            return redirect(route('logTypes.index'));
        }

        $this->logTypeRepository->delete($id);

        Flash::success('Log Type deleted successfully.');

        return redirect(route('logTypes.index'));
    }

}
