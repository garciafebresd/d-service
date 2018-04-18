<?php

use Faker\Factory as Faker;
use App\Models\RoutePoints;
use App\Repositories\RoutePointsRepository;

trait MakeRoutePointsTrait
{
    /**
     * Create fake instance of RoutePoints and save it in database
     *
     * @param array $routePointsFields
     * @return RoutePoints
     */
    public function makeRoutePoints($routePointsFields = [])
    {
        /** @var RoutePointsRepository $routePointsRepo */
        $routePointsRepo = App::make(RoutePointsRepository::class);
        $theme = $this->fakeRoutePointsData($routePointsFields);
        return $routePointsRepo->create($theme);
    }

    /**
     * Get fake instance of RoutePoints
     *
     * @param array $routePointsFields
     * @return RoutePoints
     */
    public function fakeRoutePoints($routePointsFields = [])
    {
        return new RoutePoints($this->fakeRoutePointsData($routePointsFields));
    }

    /**
     * Get fake data of RoutePoints
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoutePointsData($routePointsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'date_route' => $fake->date('Y-m-d H:i:s'),
            'calendar_service_id' => $fake->randomDigitNotNull,
            'employee_id' => $fake->randomDigitNotNull,
            'gps_data' => $fake->text,
            'gps_status' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $routePointsFields);
    }
}
