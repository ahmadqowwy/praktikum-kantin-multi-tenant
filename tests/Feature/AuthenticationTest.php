<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_guest_is_redirected_to_login_from_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_guest_is_redirected_to_login_from_tenant_dashboard(): void
    {
        $response = $this->get('/tenant/dashboard');

        $response->assertRedirect('/login');
    }
}
