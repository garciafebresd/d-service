<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSurveyContactAPIRequest;
use App\Http\Requests\API\UpdateSurveyContactAPIRequest;
use App\Models\SurveyContact;
use App\Repositories\SurveyContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SurveyContactController
 * @package App\Http\Controllers\API
 */
class SurveyContactAPIController extends AppBaseController {

    /** @var  SurveyContactRepository */
    private $surveyContactRepository;

    public function __construct(SurveyContactRepository $surveyContactRepo) {
        $this->surveyContactRepository = $surveyContactRepo;
    }

    /**
     * Display a listing of the SurveyContact.
     * GET|HEAD /surveyContacts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->surveyContactRepository->pushCriteria(new RequestCriteria($request));
        $this->surveyContactRepository->pushCriteria(new LimitOffsetCriteria($request));
        $surveyContacts = $this->surveyContactRepository->all();

        return $this->sendResponse($surveyContacts->toArray(), 'Survey Contacts retrieved successfully');
    }

    /**
     * Store a newly created SurveyContact in storage.
     * POST /surveyContacts
     *
     * @param CreateSurveyContactAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSurveyContactAPIRequest $request) {
        $input = $request->all();

        $surveyContacts = $this->surveyContactRepository->create($input);

        return $this->sendResponse($surveyContacts->toArray(), 'Survey Contact saved successfully');
    }

    /**
     * Display the specified SurveyContact.
     * GET|HEAD /surveyContacts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var SurveyContact $surveyContact */
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            return $this->sendError('Survey Contact not found');
        }

        return $this->sendResponse($surveyContact->toArray(), 'Survey Contact retrieved successfully');
    }

    /**
     * Update the specified SurveyContact in storage.
     * PUT/PATCH /surveyContacts/{id}
     *
     * @param  int $id
     * @param UpdateSurveyContactAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurveyContactAPIRequest $request) {
        $input = $request->all();

        /** @var SurveyContact $surveyContact */
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            return $this->sendError('Survey Contact not found');
        }

        $surveyContact = $this->surveyContactRepository->update($input, $id);

        return $this->sendResponse($surveyContact->toArray(), 'SurveyContact updated successfully');
    }

    /**
     * Remove the specified SurveyContact from storage.
     * DELETE /surveyContacts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var SurveyContact $surveyContact */
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            return $this->sendError('Survey Contact not found');
        }

        $surveyContact->delete();

        return $this->sendResponse($id, 'Survey Contact deleted successfully');
    }

}
