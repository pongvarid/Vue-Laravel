<?php
// -----------------------NET---------------------------------

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Model\Account\Account;
use App\Model\Account\Call;
use App\Model\Account\Task;
use App\Model\Account\Event;
use App\Model\Account\Notification;
use App\Model\Setting\Branch;
use App\Model\Agent;
use App\Model\Product;
use App\Model\Supplier;


class FakeTest  extends TestCase
{
    //use DatabaseTransactions; //ไม่รี db ไม่เซพ db
    //use RefreshDatabase; //รี db ทั้งหมด ปล. db:seed ด้วย
    //คำสั่งรัน unit test: ./vendor/bin/phpunit
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_fake_all()
    {
        factory(User::class)->create();
        factory(Branch::class)->create();
        factory(Account::class)->create();
        factory(Call::class)->create();
        factory(Task::class)->create();
        factory(Event::class)->create();
        factory(Agent::class)->create();
        factory(Notification::class)->create();
        factory(Product::class)->create();
        factory(Supplier::class)->create();
        $this->assertTrue(true);
    }
  
}
