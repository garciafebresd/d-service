<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSurveyAPIRequest;
use App\Http\Requests\API\UpdateSurveyAPIRequest;
use App\Models\Survey;
use App\Repositories\SurveyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SurveyController
 * @package App\Http\Controllers\API
 */
class SurveyAPIController extends AppBaseController {

    /** @var  SurveyRepository */
    private $surveyRepository;

    public function __construct(SurveyRepository $surveyRepo) {
        $this->surveyRepository = $surveyRepo;
    }

    /**
     * Display a listing of the Survey.
     * GET|HEAD /surveys
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->surveyRepository->pushCriteria(new RequestCriteria($request));
        $this->surveyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $surveys = $this->surveyRepository->all();

        return $this->sendResponse($surveys->toArray(), 'Surveys retrieved successfully');
    }

    /**
     * Store a newly created Survey in storage.
     * POST /surveys
     *
     * @param CreateSurveyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSurveyAPIRequest $request) {
        $input = $request->all();

        $surveys = $this->surveyRepository->create($input);

        return $this->sendResponse($surveys->toArray(), 'Survey saved successfully');
    }

    /**
     * Display the specified Survey.
     * GET|HEAD /surveys/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        return $this->sendResponse($survey->toArray(), 'Survey retrieved successfully');
    }

    /**
     * Update the specified Survey in storage.
     * PUT/PATCH /surveys/{id}
     *
     * @param  int $id
     * @param UpdateSurveyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurveyAPIRequest $request) {
        $input = $request->all();

        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        $survey = $this->surveyRepository->update($input, $id);

        return $this->sendResponse($survey->toArray(), 'Survey updated successfully');
    }

    /**
     * Remove the specified Survey from storage.
     * DELETE /surveys/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Survey $survey */
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            return $this->sendError('Survey not found');
        }

        $survey->delete();

        return $this->sendResponse($id, 'Survey deleted successfully');
    }

}
