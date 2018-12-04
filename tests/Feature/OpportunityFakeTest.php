<?php
// -----------------------NET---------------------------------

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Opportunity\Opportunity;
use App\Model\Opportunity\Opportunity_Product;
use App\Model\Opportunity\Call;
use App\Model\Opportunity\Task;
use App\Model\Opportunity\Event;

class OpportunityFakeTest extends TestCase
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
        factory(Opportunity::class)->create();
        factory(Opportunity_Product::class)->create();
        factory(Call::class)->create();
        factory(Task::class)->create();
        factory(Event::class)->create();
        $this->assertTrue(true);
    }
}
