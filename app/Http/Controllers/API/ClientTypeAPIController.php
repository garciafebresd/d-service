<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientTypeAPIRequest;
use App\Http\Requests\API\UpdateClientTypeAPIRequest;
use App\Models\ClientType;
use App\Repositories\ClientTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClientTypeController
 * @package App\Http\Controllers\API
 */
class ClientTypeAPIController extends AppBaseController {

    /** @var  ClientTypeRepository */
    private $clientTypeRepository;

    public function __construct(ClientTypeRepository $clientTypeRepo) {
        $this->clientTypeRepository = $clientTypeRepo;
    }

    /**
     * Display a listing of the ClientType.
     * GET|HEAD /clientTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->clientTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->clientTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clientTypes = $this->clientTypeRepository->all();

        return $this->sendResponse($clientTypes->toArray(), 'Client Types retrieved successfully');
    }

    /**
     * Store a newly created ClientType in storage.
     * POST /clientTypes
     *
     * @param CreateClientTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientTypeAPIRequest $request) {
        $input = $request->all();

        $clientTypes = $this->clientTypeRepository->create($input);

        return $this->sendResponse($clientTypes->toArray(), 'Client Type saved successfully');
    }

    /**
     * Display the specified ClientType.
     * GET|HEAD /clientTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        return $this->sendResponse($clientType->toArray(), 'Client Type retrieved successfully');
    }

    /**
     * Update the specified ClientType in storage.
     * PUT/PATCH /clientTypes/{id}
     *
     * @param  int $id
     * @param UpdateClientTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientTypeAPIRequest $request) {
        $input = $request->all();

        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        $clientType = $this->clientTypeRepository->update($input, $id);

        return $this->sendResponse($clientType->toArray(), 'ClientType updated successfully');
    }

    /**
     * Remove the specified ClientType from storage.
     * DELETE /clientTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->findWithoutFail($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        $clientType->delete();

        return $this->sendResponse($id, 'Client Type deleted successfully');
    }

}
