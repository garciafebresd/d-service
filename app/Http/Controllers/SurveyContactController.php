<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSurveyContactRequest;
use App\Http\Requests\UpdateSurveyContactRequest;
use App\Repositories\SurveyContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SurveyContactController extends AppBaseController {

    /** @var  SurveyContactRepository */
    private $surveyContactRepository;

    public function __construct(SurveyContactRepository $surveyContactRepo) {
        $this->surveyContactRepository = $surveyContactRepo;
    }

    /**
     * Display a listing of the SurveyContact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->surveyContactRepository->pushCriteria(new RequestCriteria($request));
        $surveyContacts = $this->surveyContactRepository->all();

        return view('survey_contacts.index')
                        ->with('surveyContacts', $surveyContacts);
    }

    /**
     * Show the form for creating a new SurveyContact.
     *
     * @return Response
     */
    public function create() {
        return view('survey_contacts.create');
    }

    /**
     * Store a newly created SurveyContact in storage.
     *
     * @param CreateSurveyContactRequest $request
     *
     * @return Response
     */
    public function store(CreateSurveyContactRequest $request) {
        $input = $request->all();

        $surveyContact = $this->surveyContactRepository->create($input);

        Flash::success('Survey Contact saved successfully.');

        return redirect(route('surveyContacts.index'));
    }

    /**
     * Display the specified SurveyContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            Flash::error('Survey Contact not found');

            return redirect(route('surveyContacts.index'));
        }

        return view('survey_contacts.show')->with('surveyContact', $surveyContact);
    }

    /**
     * Show the form for editing the specified SurveyContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            Flash::error('Survey Contact not found');

            return redirect(route('surveyContacts.index'));
        }

        return view('survey_contacts.edit')->with('surveyContact', $surveyContact);
    }

    /**
     * Update the specified SurveyContact in storage.
     *
     * @param  int              $id
     * @param UpdateSurveyContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurveyContactRequest $request) {
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            Flash::error('Survey Contact not found');

            return redirect(route('surveyContacts.index'));
        }

        $surveyContact = $this->surveyContactRepository->update($request->all(), $id);

        Flash::success('Survey Contact updated successfully.');

        return redirect(route('surveyContacts.index'));
    }

    /**
     * Remove the specified SurveyContact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $surveyContact = $this->surveyContactRepository->findWithoutFail($id);

        if (empty($surveyContact)) {
            Flash::error('Survey Contact not found');

            return redirect(route('surveyContacts.index'));
        }

        $this->surveyContactRepository->delete($id);

        Flash::success('Survey Contact deleted successfully.');

        return redirect(route('surveyContacts.index'));
    }

}
