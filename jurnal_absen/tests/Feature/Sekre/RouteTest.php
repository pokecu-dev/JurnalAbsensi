<?php

namespace Tests\Feature\Sekre;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_dashboard()
    {
        $user = User::where('role', 'sekre')->first();
        $response = $this->actingAs($user)->get('/sekre/dashboard');
        $response->assertStatus(200);
    }
    public function test_jurnal()
    {
        $user = User::where('role', 'sekre')->first();
        $response = $this->actingAs($user)->get('/sekre/jurnal');
        $response->assertStatus(200);
    }
    public function test_jadwal()
    {
        $user = User::where('role', 'sekre')->first();
        $response = $this->actingAs($user)->get('/sekre/jadwal');
        $response->assertStatus(200);
    }
}
