<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserTypeAPIRequest;
use App\Http\Requests\API\UpdateUserTypeAPIRequest;
use App\Models\UserType;
use App\Repositories\UserTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserTypeController
 * @package App\Http\Controllers\API
 */
class UserTypeAPIController extends AppBaseController {

    /** @var  UserTypeRepository */
    private $userTypeRepository;

    public function __construct(UserTypeRepository $userTypeRepo) {
        $this->userTypeRepository = $userTypeRepo;
    }

    /**
     * Display a listing of the UserType.
     * GET|HEAD /userTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->userTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->userTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userTypes = $this->userTypeRepository->all();

        return $this->sendResponse($userTypes->toArray(), 'User Types retrieved successfully');
    }

    /**
     * Store a newly created UserType in storage.
     * POST /userTypes
     *
     * @param CreateUserTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserTypeAPIRequest $request) {
        $input = $request->all();

        $userTypes = $this->userTypeRepository->create($input);

        return $this->sendResponse($userTypes->toArray(), 'User Type saved successfully');
    }

    /**
     * Display the specified UserType.
     * GET|HEAD /userTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var UserType $userType */
        $userType = $this->userTypeRepository->findWithoutFail($id);

        if (empty($userType)) {
            return $this->sendError('User Type not found');
        }

        return $this->sendResponse($userType->toArray(), 'User Type retrieved successfully');
    }

    /**
     * Update the specified UserType in storage.
     * PUT/PATCH /userTypes/{id}
     *
     * @param  int $id
     * @param UpdateUserTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserTypeAPIRequest $request) {
        $input = $request->all();

        /** @var UserType $userType */
        $userType = $this->userTypeRepository->findWithoutFail($id);

        if (empty($userType)) {
            return $this->sendError('User Type not found');
        }

        $userType = $this->userTypeRepository->update($input, $id);

        return $this->sendResponse($userType->toArray(), 'UserType updated successfully');
    }

    /**
     * Remove the specified UserType from storage.
     * DELETE /userTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var UserType $userType */
        $userType = $this->userTypeRepository->findWithoutFail($id);

        if (empty($userType)) {
            return $this->sendError('User Type not found');
        }

        $userType->delete();

        return $this->sendResponse($id, 'User Type deleted successfully');
    }

}
