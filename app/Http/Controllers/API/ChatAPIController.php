<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateChatAPIRequest;
use App\Http\Requests\API\UpdateChatAPIRequest;
use App\Models\Chat;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ChatController
 * @package App\Http\Controllers\API
 */
class ChatAPIController extends AppBaseController {

    /** @var  ChatRepository */
    private $chatRepository;

    public function __construct(ChatRepository $chatRepo) {
        $this->chatRepository = $chatRepo;
    }

    /**
     * Display a listing of the Chat.
     * GET|HEAD /chats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->chatRepository->pushCriteria(new RequestCriteria($request));
        $this->chatRepository->pushCriteria(new LimitOffsetCriteria($request));
        $chats = $this->chatRepository->all();

        return $this->sendResponse($chats->toArray(), 'Chats retrieved successfully');
    }

    /**
     * Store a newly created Chat in storage.
     * POST /chats
     *
     * @param CreateChatAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateChatAPIRequest $request) {
        $input = $request->all();

        $chats = $this->chatRepository->create($input);

        return $this->sendResponse($chats->toArray(), 'Chat saved successfully');
    }

    /**
     * Display the specified Chat.
     * GET|HEAD /chats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Chat $chat */
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            return $this->sendError('Chat not found');
        }

        return $this->sendResponse($chat->toArray(), 'Chat retrieved successfully');
    }

    /**
     * Update the specified Chat in storage.
     * PUT/PATCH /chats/{id}
     *
     * @param  int $id
     * @param UpdateChatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChatAPIRequest $request) {
        $input = $request->all();

        /** @var Chat $chat */
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            return $this->sendError('Chat not found');
        }

        $chat = $this->chatRepository->update($input, $id);

        return $this->sendResponse($chat->toArray(), 'Chat updated successfully');
    }

    /**
     * Remove the specified Chat from storage.
     * DELETE /chats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Chat $chat */
        $chat = $this->chatRepository->findWithoutFail($id);

        if (empty($chat)) {
            return $this->sendError('Chat not found');
        }

        $chat->delete();

        return $this->sendResponse($id, 'Chat deleted successfully');
    }

}
