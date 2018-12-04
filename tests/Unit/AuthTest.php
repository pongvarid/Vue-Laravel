<?php
// -----------------------NET---------------------------------

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Account\Call;

class AuthTest  extends TestCase
{
    use DatabaseTransactions; //ไม่รี db ไม่เซพ db
    //use RefreshDatabase; //รี db ทั้งหมด ปล. db:seed ด้วย
    //คำสั่งรัน unit test: ./vendor/bin/phpunit
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testURL()
    {
        $response = $this->call('GET','/#/login');
        $this->assertEquals(200,$response->status());
        //$response->assertSee('Login');
    }

    public function testLogin()
    {
        for($i=0;$i<5;$i++){
            $user = factory(User::class)->create();
            $response = $this->call('POST', '/login', [
                'email' => $user->email,
                'password' => '1234', //ถูก
            ]);
            $this->assertEquals(200, $response->getStatusCode());
            $this->assertAuthenticatedAs($user);
        }
    }

    public function test_account_call()
    {
        $data = factory(Call::class)->create([
            'subject' => 'สวัสดีจ้า',
            'comment' => 'Hello world'
        ]);
        $found_call = Call::find($data->id);
        $this->assertEquals($found_call->subject,'สวัสดีจ้า');
        $this->assertEquals($found_call->comment,'Hello world');

        $this->assertDatabaseHas('account_logacall',[
            'id'=>$data->id,
            'subject'=>'สวัสดีจ้า',
            'comment'=>'Hello world'
        ]);
    }


}


