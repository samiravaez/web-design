<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\Product_voucherSeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    use RefreshDatabase;
    public $paginationNum;
    public $products;

    public function test_product()
    {
        $this->products = 'products';
        $this->paginationNum = config('global.baseInfo.pagination');
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        $this->a_user_can_view_all_products();
        $this->a_user_can_create_new_product();
        $this->a_user_can_update_product();
        $this->a_user_can_delete_product();
    }

    public function a_user_can_view_all_products()
    {
        // make() does not persist model in database.we need to call save() to persist it.
        //but create() makes model and saves it to the database:
        $product = Product::factory()->count($this->paginationNum + 1)->create();
        $response = $this->get('admin/products/list');
        $response->assertStatus(200)
            ->assertSee([$product[$this->paginationNum - 1]->name,
                $product[$this->paginationNum - 1]->price])
            ->assertDontSee([$product[$this->paginationNum]->name,
                $product[$this->paginationNum]->price]);
//        $response = $this->call('GET', 'product.list');
//        $response->assertStatus(200);
    }

    public function a_user_can_create_new_product()
    {
        $product = Product::factory()->make();
        $response = $this->post('admin/products/store', $product->toArray());
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertDatabaseHas('products', ['name'=> $product->name ,
            'price' => $product->price]);
    }

    public function a_user_can_update_product()
    {
        $product = Product::factory()->create();
        $product->name = 'updated name';
        $response = $this->patch('admin/products/update/'.$product->id, $product->toArray());
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertDatabaseHas('products', ['id'=> $product->id ,
            'name' => 'updated name']);
    }

    public function a_user_can_delete_product()
    {
        $product = Product::factory()->create();
        $response = $this->delete('admin/products/destroy/'.$product->id);
        $response->assertStatus(302); //successfully redirected after storing data
        $this->assertSoftDeleted('products', ['id'=> $product->id]);
    }
}
