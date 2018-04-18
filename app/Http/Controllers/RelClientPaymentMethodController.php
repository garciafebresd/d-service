<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRelClientPaymentMethodRequest;
use App\Http\Requests\UpdateRelClientPaymentMethodRequest;
use App\Repositories\RelClientPaymentMethodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RelClientPaymentMethodController extends AppBaseController {

    /** @var  RelClientPaymentMethodRepository */
    private $relClientPaymentMethodRepository;

    public function __construct(RelClientPaymentMethodRepository $relClientPaymentMethodRepo) {
        $this->relClientPaymentMethodRepository = $relClientPaymentMethodRepo;
    }

    /**
     * Display a listing of the RelClientPaymentMethod.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->relClientPaymentMethodRepository->pushCriteria(new RequestCriteria($request));
        $relClientPaymentMethods = $this->relClientPaymentMethodRepository->all();

        return view('rel_client_payment_methods.index')
                        ->with('relClientPaymentMethods', $relClientPaymentMethods);
    }

    /**
     * Show the form for creating a new RelClientPaymentMethod.
     *
     * @return Response
     */
    public function create() {
        return view('rel_client_payment_methods.create');
    }

    /**
     * Store a newly created RelClientPaymentMethod in storage.
     *
     * @param CreateRelClientPaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateRelClientPaymentMethodRequest $request) {
        $input = $request->all();

        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->create($input);

        Flash::success('Rel Client Payment Method saved successfully.');

        return redirect(route('relClientPaymentMethods.index'));
    }

    /**
     * Display the specified RelClientPaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            Flash::error('Rel Client Payment Method not found');

            return redirect(route('relClientPaymentMethods.index'));
        }

        return view('rel_client_payment_methods.show')->with('relClientPaymentMethod', $relClientPaymentMethod);
    }

    /**
     * Show the form for editing the specified RelClientPaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            Flash::error('Rel Client Payment Method not found');

            return redirect(route('relClientPaymentMethods.index'));
        }

        return view('rel_client_payment_methods.edit')->with('relClientPaymentMethod', $relClientPaymentMethod);
    }

    /**
     * Update the specified RelClientPaymentMethod in storage.
     *
     * @param  int              $id
     * @param UpdateRelClientPaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelClientPaymentMethodRequest $request) {
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            Flash::error('Rel Client Payment Method not found');

            return redirect(route('relClientPaymentMethods.index'));
        }

        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->update($request->all(), $id);

        Flash::success('Rel Client Payment Method updated successfully.');

        return redirect(route('relClientPaymentMethods.index'));
    }

    /**
     * Remove the specified RelClientPaymentMethod from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $relClientPaymentMethod = $this->relClientPaymentMethodRepository->findWithoutFail($id);

        if (empty($relClientPaymentMethod)) {
            Flash::error('Rel Client Payment Method not found');

            return redirect(route('relClientPaymentMethods.index'));
        }

        $this->relClientPaymentMethodRepository->delete($id);

        Flash::success('Rel Client Payment Method deleted successfully.');

        return redirect(route('relClientPaymentMethods.index'));
    }

}
