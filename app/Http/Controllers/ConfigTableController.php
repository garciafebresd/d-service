<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConfigTableRequest;
use App\Http\Requests\UpdateConfigTableRequest;
use App\Repositories\ConfigTableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConfigTableController extends AppBaseController {

    /** @var  ConfigTableRepository */
    private $configTableRepository;

    public function __construct(ConfigTableRepository $configTableRepo) {
        $this->configTableRepository = $configTableRepo;
    }

    /**
     * Display a listing of the ConfigTable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->configTableRepository->pushCriteria(new RequestCriteria($request));
        $configTables = $this->configTableRepository->all();

        return view('config_tables.index')
                        ->with('configTables', $configTables);
    }

    /**
     * Show the form for creating a new ConfigTable.
     *
     * @return Response
     */
    public function create() {
        return view('config_tables.create');
    }

    /**
     * Store a newly created ConfigTable in storage.
     *
     * @param CreateConfigTableRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigTableRequest $request) {
        $input = $request->all();

        $configTable = $this->configTableRepository->create($input);

        Flash::success('Config Table saved successfully.');

        return redirect(route('configTables.index'));
    }

    /**
     * Display the specified ConfigTable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            Flash::error('Config Table not found');

            return redirect(route('configTables.index'));
        }

        return view('config_tables.show')->with('configTable', $configTable);
    }

    /**
     * Show the form for editing the specified ConfigTable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            Flash::error('Config Table not found');

            return redirect(route('configTables.index'));
        }

        return view('config_tables.edit')->with('configTable', $configTable);
    }

    /**
     * Update the specified ConfigTable in storage.
     *
     * @param  int              $id
     * @param UpdateConfigTableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigTableRequest $request) {
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            Flash::error('Config Table not found');

            return redirect(route('configTables.index'));
        }

        $configTable = $this->configTableRepository->update($request->all(), $id);

        Flash::success('Config Table updated successfully.');

        return redirect(route('configTables.index'));
    }

    /**
     * Remove the specified ConfigTable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            Flash::error('Config Table not found');

            return redirect(route('configTables.index'));
        }

        $this->configTableRepository->delete($id);

        Flash::success('Config Table deleted successfully.');

        return redirect(route('configTables.index'));
    }

}
