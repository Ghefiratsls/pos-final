<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use App\Models\KeranjangDetail;

class ClearKeranjangTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_clears_the_cart()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $keranjangDetail = KeranjangDetail::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('keranjang.clear'), [
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('keranjang_details', [
            'id' => $keranjangDetail->id
        ]);
    }
}
