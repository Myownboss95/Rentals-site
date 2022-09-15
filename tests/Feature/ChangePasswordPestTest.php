<?php

use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('has change password page', function () {
    $response = $this->actingAs($this->user)->get('change-password');
    $response->assertStatus(200);
    $response->assertSee($this->user->email);
});

test('validate that old password is required', function () {
    $response = $this->actingAs($this->user)->post(route('password.change'), [
        'old_password' => '',
    ]);

    $response->assertSessionHasErrors('old_password');
});

test('validate that password and password confirmation must match', function () {
    $response = $this->actingAs($this->user)->post(route('password.change'), [
        'old_password' => 'password',
        'password' => 'new password',
        'password_confirmation' => 'new Password',
    ]);
    $response->assertSessionHasErrors('password');
});


test('old passward must match the user password', function () {
    $response = $this->actingAs($this->user)->post(route('password.change'), [
        'old_password' => 'incorrect old password',
        'password' => 'new password',
        'password_confirmation' => 'new password',
    ]);

    $response->assertSessionHasErrors(['error' => 'The provided old password does not match your current password']);
});

test('new password must not be equal to old password', function () {
    $response = $this->actingAs($this->user)->post(route('password.change'), [
        'old_password' => 'password',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $response->assertSessionHasErrors(['error' => 'Password cannot be same as your old password']);
});

test('password can be changed', function () {
    $response = $this->actingAs($this->user)->post(route('password.change'), [
        'old_password' => 'password',
        'password' => 'new password',
        'password_confirmation' => 'new password',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasNoErrors();
    $response->assertSessionHas('success', 'Password changed successfully');
});
