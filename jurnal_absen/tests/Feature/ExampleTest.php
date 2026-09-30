<?php

it('redirects guests from the root route to the login page', function () {
    $this->get('/')->assertRedirect(route('login'));
});
