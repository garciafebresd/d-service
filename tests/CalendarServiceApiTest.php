<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CalendarServiceApiTest extends TestCase
{
    use MakeCalendarServiceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCalendarService()
    {
        $calendarService = $this->fakeCalendarServiceData();
        $this->json('POST', '/api/v1/calendarServices', $calendarService);

        $this->assertApiResponse($calendarService);
    }

    /**
     * @test
     */
    public function testReadCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $this->json('GET', '/api/v1/calendarServices/'.$calendarService->id);

        $this->assertApiResponse($calendarService->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $editedCalendarService = $this->fakeCalendarServiceData();

        $this->json('PUT', '/api/v1/calendarServices/'.$calendarService->id, $editedCalendarService);

        $this->assertApiResponse($editedCalendarService);
    }

    /**
     * @test
     */
    public function testDeleteCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $this->json('DELETE', '/api/v1/calendarServices/'.$calendarService->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/calendarServices/'.$calendarService->id);

        $this->assertResponseStatus(404);
    }
}
