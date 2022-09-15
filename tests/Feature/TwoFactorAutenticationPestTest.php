<?php

use App\Models\User;

beforeEach(function () {
    $this->withoutExceptionHandling();
    $this->user = User::factory()->create();
});


it('has two factor authentication page', function () {
    $response = $this->actingAs($this->user)->get(route('two-factor-auth'));
    $response->assertStatus(200);
});

it('can enable two factor authentication', function () {
    $response = $this->actingAs($this->user)->post(route('two-factor.enable'));
    $response->assertStatus(302);
    $response->assertSessionHas(['status' => 'two-factor-authentication-enabled']);
});

it('can disable two factor authentication', function () {
    $response = $this->actingAs($this->user)->delete(route('two-factor.disable'));
    $response->assertStatus(302);
    $response->assertSessionHas(['status' => 'two-factor-authentication-disabled']);
});


it('can get two factor svg via user instance', function () {
    $this->actingAs($this->user)->post(route('two-factor.enable'));
    $this->user->refresh();
    $this->expect($this->user->recoveryCodes())->not->toBeEmpty();
    $this->expect($this->user->recoveryCodes())->toBeArray();
});
