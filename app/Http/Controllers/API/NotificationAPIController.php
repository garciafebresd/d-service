<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNotificationAPIRequest;
use App\Http\Requests\API\UpdateNotificationAPIRequest;
use App\Models\Notification;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NotificationController
 * @package App\Http\Controllers\API
 */
class NotificationAPIController extends AppBaseController {

    /** @var  NotificationRepository */
    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepo) {
        $this->notificationRepository = $notificationRepo;
    }

    /**
     * Display a listing of the Notification.
     * GET|HEAD /notifications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->notificationRepository->pushCriteria(new RequestCriteria($request));
        $this->notificationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $notifications = $this->notificationRepository->all();

        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');
    }

    /**
     * Store a newly created Notification in storage.
     * POST /notifications
     *
     * @param CreateNotificationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNotificationAPIRequest $request) {
        $input = $request->all();

        $notifications = $this->notificationRepository->create($input);

        return $this->sendResponse($notifications->toArray(), 'Notification saved successfully');
    }

    /**
     * Display the specified Notification.
     * GET|HEAD /notifications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var Notification $notification */
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            return $this->sendError('Notification not found');
        }

        return $this->sendResponse($notification->toArray(), 'Notification retrieved successfully');
    }

    /**
     * Update the specified Notification in storage.
     * PUT/PATCH /notifications/{id}
     *
     * @param  int $id
     * @param UpdateNotificationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotificationAPIRequest $request) {
        $input = $request->all();

        /** @var Notification $notification */
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            return $this->sendError('Notification not found');
        }

        $notification = $this->notificationRepository->update($input, $id);

        return $this->sendResponse($notification->toArray(), 'Notification updated successfully');
    }

    /**
     * Remove the specified Notification from storage.
     * DELETE /notifications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var Notification $notification */
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            return $this->sendError('Notification not found');
        }

        $notification->delete();

        return $this->sendResponse($id, 'Notification deleted successfully');
    }

}
