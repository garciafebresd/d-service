<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Repositories\ChatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChatController extends AppBaseController {

    /** @var  ChatRepository */
    private $chatRepository;

    public function __construct(ChatRepository $chatRepo) {
        $this->chatRepository = $chatRepo;
    }

    /**
     * Display a listing of the Chat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->chatRepository->pushCriteria(new RequestCriteria($request));
        $chats = $this->chatRepository->all();

        return view('chats.index')
                        ->with('chats', $chats);
    }

    /**
     * Show the form for creating a new Chat.
     *
     * @return Response
     */
    public function create() {
        return view('chats.create');
    }

    /**
     * Store a newly created Chat in storage.
     *
     * @param CreateChatRequest $request
     *
     * @return Response
     */
    public function store(CreateChatRequest $request) {
        $input = $request->all();

        $chat = $this->chatRepository->create($input);

        Flash::success('Chat saved successfully.');

        return redirect(route('chats.index'));
    }

    /**
     * Display the specified Chat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            Flash::error('Chat not found');

            return redirect(route('chats.index'));
        }

        return view('chats.show')->with('chat', $chat);
    }

    /**
     * Show the form for editing the specified Chat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            Flash::error('Chat not found');

            return redirect(route('chats.index'));
        }

        return view('chats.edit')->with('chat', $chat);
    }

    /**
     * Update the specified Chat in storage.
     *
     * @param  int              $id
     * @param UpdateChatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChatRequest $request) {
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            Flash::error('Chat not found');

            return redirect(route('chats.index'));
        }

        $chat = $this->chatRepository->update($request->all(), $id);

        Flash::success('Chat updated successfully.');

        return redirect(route('chats.index'));
    }

    /**
     * Remove the specified Chat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            Flash::error('Chat not found');

            return redirect(route('chats.index'));
        }

        $this->chatRepository->delete($id);

        Flash::success('Chat deleted successfully.');

        return redirect(route('chats.index'));
    }

}
