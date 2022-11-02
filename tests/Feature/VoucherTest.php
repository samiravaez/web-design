<?php

namespace Tests\Feature;

use App\Models\Voucher;
use App\Models\User;
use Database\Seeders\Product_voucherSeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VoucherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    use RefreshDatabase;
    public $paginationNum;
    public $vouchers;

    public function test_voucher()
    {
        $this->vouchers = 'vouchers';
        $this->paginationNum = config('global.baseInfo.pagination');
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        $this->a_user_can_view_assigned_vouchers();
        $this->admin_can_create_new_voucher();
        $this->admin_can_update_voucher();
        $this->admin_can_delete_voucher();
    }

    public function a_user_can_view_assigned_vouchers()
    {
        // make() does not persist model in database.we need to call save() to persist it.
        //but create() makes model and saves it to the database:
        $voucher = Voucher::factory()->count($this->paginationNum + 1)->create();
        $response = $this->get('admin/vouchers/list');
        $response->assertStatus(200)
            ->assertSee([$voucher[$this->paginationNum - 1]->name,
                $voucher[$this->paginationNum - 1]->code])
            ->assertDontSee([$voucher[$this->paginationNum]->name,
                $voucher[$this->paginationNum]->code]);
//        $response = $this->call('GET', 'voucher.list');
//        $response->assertStatus(200);
    }

    public function admin_can_create_new_voucher()
    {
        $voucher = Voucher::factory()->make();
        $response = $this->post('admin/vouchers/store', $voucher->toArray());
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertDatabaseHas('vouchers', ['name'=> $voucher->name ,
            'code' => $voucher->code]);
    }

    public function admin_can_update_voucher()
    {
        $voucher = Voucher::factory()->create();
        $voucher->name = 'updated name';
        $response = $this->patch('admin/vouchers/update/'.$voucher->id, $voucher->toArray());
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertDatabaseHas('vouchers', ['id'=> $voucher->id ,
            'name' => 'updated name']);
    }

    public function admin_can_delete_voucher()
    {
        $voucher = Voucher::factory()->create();
        $response = $this->delete('admin/vouchers/destroy/'.$voucher->id);
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertSoftDeleted('vouchers', ['id'=> $voucher->id]);
    }
}
