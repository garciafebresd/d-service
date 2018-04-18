<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentMethodEnabledRequest;
use App\Http\Requests\UpdatePaymentMethodEnabledRequest;
use App\Repositories\PaymentMethodEnabledRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaymentMethodEnabledController extends AppBaseController {

    /** @var  PaymentMethodEnabledRepository */
    private $paymentMethodEnabledRepository;

    public function __construct(PaymentMethodEnabledRepository $paymentMethodEnabledRepo) {
        $this->paymentMethodEnabledRepository = $paymentMethodEnabledRepo;
    }

    /**
     * Display a listing of the PaymentMethodEnabled.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->paymentMethodEnabledRepository->pushCriteria(new RequestCriteria($request));
        $paymentMethodEnableds = $this->paymentMethodEnabledRepository->all();

        return view('payment_method_enableds.index')
                        ->with('paymentMethodEnableds', $paymentMethodEnableds);
    }

    /**
     * Show the form for creating a new PaymentMethodEnabled.
     *
     * @return Response
     */
    public function create() {
        return view('payment_method_enableds.create');
    }

    /**
     * Store a newly created PaymentMethodEnabled in storage.
     *
     * @param CreatePaymentMethodEnabledRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentMethodEnabledRequest $request) {
        $input = $request->all();

        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->create($input);

        Flash::success('Payment Method Enabled saved successfully.');

        return redirect(route('paymentMethodEnableds.index'));
    }

    /**
     * Display the specified PaymentMethodEnabled.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            Flash::error('Payment Method Enabled not found');

            return redirect(route('paymentMethodEnableds.index'));
        }

        return view('payment_method_enableds.show')->with('paymentMethodEnabled', $paymentMethodEnabled);
    }

    /**
     * Show the form for editing the specified PaymentMethodEnabled.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            Flash::error('Payment Method Enabled not found');

            return redirect(route('paymentMethodEnableds.index'));
        }

        return view('payment_method_enableds.edit')->with('paymentMethodEnabled', $paymentMethodEnabled);
    }

    /**
     * Update the specified PaymentMethodEnabled in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentMethodEnabledRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentMethodEnabledRequest $request) {
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            Flash::error('Payment Method Enabled not found');

            return redirect(route('paymentMethodEnableds.index'));
        }

        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->update($request->all(), $id);

        Flash::success('Payment Method Enabled updated successfully.');

        return redirect(route('paymentMethodEnableds.index'));
    }

    /**
     * Remove the specified PaymentMethodEnabled from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $paymentMethodEnabled = $this->paymentMethodEnabledRepository->findWithoutFail($id);

        if (empty($paymentMethodEnabled)) {
            Flash::error('Payment Method Enabled not found');

            return redirect(route('paymentMethodEnableds.index'));
        }

        $this->paymentMethodEnabledRepository->delete($id);

        Flash::success('Payment Method Enabled deleted successfully.');

        return redirect(route('paymentMethodEnableds.index'));
    }

}
