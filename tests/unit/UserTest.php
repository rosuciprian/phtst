<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	/**
	 * @test
	 */
	public function that_we_can_get_the_first_name()
	{
		$user = new \App\Models\User;

		$user->setFirstName('Billy');

		$this->assertEquals($user->getFirstName(), 'Billy');
	}

	public function test_that_we_can_get_the_last_name()
	{
		$user = new \App\Models\User;

		$user->setLastName('Joe');

		$this->assertEquals($user->getLastName(), 'Joe');
	}

	public function test_full_name_is_returned()
	{
		$user = new \App\Models\User;
		$user->setFirstName('Billy');
		$user->setLastName('Joe');

		$this->assertEquals( $user->getFullName(), 'Billy Joe');
	}

	public function test_first_and_last_name_are_trimmed()
	{
		$user = new \App\Models\User;
		$user->setFirstName('Billy  ');
		$user->setLastName('     Joe');

		$this->assertEquals( $user->getFullName(), 'Billy Joe');
	}

	public function test_email_address_can_be_set()
	{
		$user = new \App\Models\User;
		$user->setEmail('billy@codecourse.com');

		$this->assertEquals($user->getEmail(), 'billy@codecourse.com');
	}

	/** @test */
	public function test_email_variables_contain_correct_values() {
		$user = new \App\Models\User;
		$user->setFirstName('Billy  ');
		$user->setLastName('     Joe');
		$user->setEmail('billy@codecourse.com');

		$email_variables = $user->get_email_variables();
		$this->assertArrayHasKey('full_name', $email_variables);
		$this->assertArrayHasKey('email', $email_variables);

		$this->assertEquals($email_variables['full_name'], 'Billy Joe');
		$this->assertEquals($email_variables['email'], 'billy@codecourse.com');
	}
}