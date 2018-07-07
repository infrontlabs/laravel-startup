<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Startup\Requests\Account\CreateAccountRequest;
use Startup\Requests\Account\CreateSubscriptionRequest;
use Startup\Requests\Account\PasswordChangeRequest;
use Tests\TestCase;

class CustomFormRequestTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function create_account_request_validates_account_name()
    {
        $request = new CreateAccountRequest();
        $rules = $request->rules();
        $validator = Validator::make(['account_name' => 'Hello world'], $rules);
        $this->assertFalse($validator->fails());

        $validator = Validator::make(['invalid_field' => 'Hello world'], $rules);
        $this->assertTrue($validator->errors()->has('account_name'));
    }

    /**
     * @test
     */
    public function create_subscription_request()
    {
        $request = new CreateSubscriptionRequest();
        $rules = $request->rules();

        // test passes
        $validator = Validator::make(['billing_name' => 'Jane Dope', 'stripe_token' => 'abc1234'], $rules);
        $this->assertFalse($validator->fails());

        // test fails
        $validator = Validator::make(['invalid_field' => 'asdasd'], $rules);

        $this->assertTrue($validator->errors()->has('billing_name'));
        $this->assertTrue($validator->errors()->has('stripe_token'));

    }

    /**
     * @test
     */
    public function password_change_request()
    {

        $user = factory(User::class)->create(['password' => bcrypt('secret')]);
        $this->actingAs($user);

        $request = new PasswordChangeRequest();
        $rules = $request->rules();

        // test passes
        $validator = Validator::make([
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
            'password_current' => 'secret'], $rules);
        $this->assertFalse($validator->fails());

        // test fails
        $validator = Validator::make([
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
            'password_current' => 'secretaaaaa'], $rules);

        $this->assertTrue($validator->errors()->has('password_current'));

    }
}
