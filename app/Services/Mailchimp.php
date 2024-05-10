<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Mailchimp
{
    public function __construct(protected ApiClient $clinet)
    {
    }
    public function subscribe(string $email, ?String $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');
        return $this->clinet->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
