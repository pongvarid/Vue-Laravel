<?php
// -----------------------NET---------------------------------

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\Lead\Lead;
use App\Model\Lead\Call;
use App\Model\Lead\Task;
use App\Model\Lead\Event;

class LeadFakeTest extends TestCase
{
    //use DatabaseTransactions; //ไม่รี db ไม่เซพ db
    //use RefreshDatabase; //รี db ทั้งหมด ปล. db:seed ด้วย
    //คำสั่งรัน unit test: ./vendor/bin/phpunit
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_fake_activity()
    {
        factory(Lead::class)->create();
        factory(Call::class)->create();
        factory(Task::class)->create();
        factory(Event::class)->create();
        $this->assertTrue(true);
    }
}
