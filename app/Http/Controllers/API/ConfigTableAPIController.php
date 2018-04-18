<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConfigTableAPIRequest;
use App\Http\Requests\API\UpdateConfigTableAPIRequest;
use App\Models\ConfigTable;
use App\Repositories\ConfigTableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConfigTableController
 * @package App\Http\Controllers\API
 */
class ConfigTableAPIController extends AppBaseController {

    /** @var  ConfigTableRepository */
    private $configTableRepository;

    public function __construct(ConfigTableRepository $configTableRepo) {
        $this->configTableRepository = $configTableRepo;
    }

    /**
     * Display a listing of the ConfigTable.
     * GET|HEAD /configTables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->configTableRepository->pushCriteria(new RequestCriteria($request));
        $this->configTableRepository->pushCriteria(new LimitOffsetCriteria($request));
        $configTables = $this->configTableRepository->all();

        return $this->sendResponse($configTables->toArray(), 'Config Tables retrieved successfully');
    }

    /**
     * Store a newly created ConfigTable in storage.
     * POST /configTables
     *
     * @param CreateConfigTableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigTableAPIRequest $request) {
        $input = $request->all();

        $configTables = $this->configTableRepository->create($input);

        return $this->sendResponse($configTables->toArray(), 'Config Table saved successfully');
    }

    /**
     * Display the specified ConfigTable.
     * GET|HEAD /configTables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var ConfigTable $configTable */
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            return $this->sendError('Config Table not found');
        }

        return $this->sendResponse($configTable->toArray(), 'Config Table retrieved successfully');
    }

    /**
     * Update the specified ConfigTable in storage.
     * PUT/PATCH /configTables/{id}
     *
     * @param  int $id
     * @param UpdateConfigTableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigTableAPIRequest $request) {
        $input = $request->all();

        /** @var ConfigTable $configTable */
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            return $this->sendError('Config Table not found');
        }

        $configTable = $this->configTableRepository->update($input, $id);

        return $this->sendResponse($configTable->toArray(), 'ConfigTable updated successfully');
    }

    /**
     * Remove the specified ConfigTable from storage.
     * DELETE /configTables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var ConfigTable $configTable */
        $configTable = $this->configTableRepository->findWithoutFail($id);

        if (empty($configTable)) {
            return $this->sendError('Config Table not found');
        }

        $configTable->delete();

        return $this->sendResponse($id, 'Config Table deleted successfully');
    }

}
