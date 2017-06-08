<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CredentialsControllerTest extends WebTestCase
{
    public function testPostauthtokens()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'auth-tokens');
    }

}
