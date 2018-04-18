<?php

use App\Models\CalendarService;
use App\Repositories\CalendarServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CalendarServiceRepositoryTest extends TestCase
{
    use MakeCalendarServiceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CalendarServiceRepository
     */
    protected $calendarServiceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->calendarServiceRepo = App::make(CalendarServiceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCalendarService()
    {
        $calendarService = $this->fakeCalendarServiceData();
        $createdCalendarService = $this->calendarServiceRepo->create($calendarService);
        $createdCalendarService = $createdCalendarService->toArray();
        $this->assertArrayHasKey('id', $createdCalendarService);
        $this->assertNotNull($createdCalendarService['id'], 'Created CalendarService must have id specified');
        $this->assertNotNull(CalendarService::find($createdCalendarService['id']), 'CalendarService with given id must be in DB');
        $this->assertModelData($calendarService, $createdCalendarService);
    }

    /**
     * @test read
     */
    public function testReadCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $dbCalendarService = $this->calendarServiceRepo->find($calendarService->id);
        $dbCalendarService = $dbCalendarService->toArray();
        $this->assertModelData($calendarService->toArray(), $dbCalendarService);
    }

    /**
     * @test update
     */
    public function testUpdateCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $fakeCalendarService = $this->fakeCalendarServiceData();
        $updatedCalendarService = $this->calendarServiceRepo->update($fakeCalendarService, $calendarService->id);
        $this->assertModelData($fakeCalendarService, $updatedCalendarService->toArray());
        $dbCalendarService = $this->calendarServiceRepo->find($calendarService->id);
        $this->assertModelData($fakeCalendarService, $dbCalendarService->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCalendarService()
    {
        $calendarService = $this->makeCalendarService();
        $resp = $this->calendarServiceRepo->delete($calendarService->id);
        $this->assertTrue($resp);
        $this->assertNull(CalendarService::find($calendarService->id), 'CalendarService should not exist in DB');
    }
}
