<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LieuxControllerTest extends WebTestCase
{
    public function testGetlieux()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lieux');
    }

    public function testGetlieu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lieux/{id}');
    }

    public function testPostlieu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lieux');
    }

    public function testRemovelieu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lieux/{id}');
    }

}
