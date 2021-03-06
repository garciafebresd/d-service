<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use App\Repositories\ClientsRepository;
use App\Repositories\ClientTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientsController extends AppBaseController {

    /** @var  ClientsRepository */
    private $clientsRepository;
    private $clientTypeRepository;

    public function __construct(ClientsRepository $clientsRepo, ClientTypeRepository $clientTypeRepo) {
        $this->clientsRepository = $clientsRepo;
        $this->clientTypeRepository = $clientTypeRepo;
    }

    /**
     * Display a listing of the Clients.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->clientsRepository->pushCriteria(new RequestCriteria($request));
        $clients = $this->clientsRepository->all();

        return view('clients.index')
                        ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new Clients.
     *
     * @return Response
     */
    public function create() {
        $clientType = $this->clientTypeRepository->all();
        return view('clients.create')
                        ->with('clientType', $clientType);
    }

    /**
     * Store a newly created Clients in storage.
     *
     * @param CreateClientsRequest $request
     *
     * @return Response
     */
    public function store(CreateClientsRequest $request) {
        $input = $request->all();

        $clients = $this->clientsRepository->create($input);

        Flash::success('Clients saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Clients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $clients = $this->clientsRepository->findWithoutFail($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('clients', $clients);
    }

    /**
     * Show the form for editing the specified Clients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $clients = $this->clientsRepository->findWithoutFail($id);

        if (empty($clients)) {
            Flash::error('Clients not found');
            return redirect(route('clients.index'));
        }

        $clientType = $this->clientTypeRepository->all();
        
        return view('clients.edit')->with(array('clients'=> $clients,'clientType'=> $clientType));
    }

    /**
     * Update the specified Clients in storage.
     *
     * @param  int              $id
     * @param UpdateClientsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientsRequest $request) {
        $clients = $this->clientsRepository->findWithoutFail($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        $clients = $this->clientsRepository->update($request->all(), $id);

        Flash::success('Clients updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Clients from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $clients = $this->clientsRepository->findWithoutFail($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        $this->clientsRepository->delete($id);

        Flash::success('Clients deleted successfully.');

        return redirect(route('clients.index'));
    }

}
