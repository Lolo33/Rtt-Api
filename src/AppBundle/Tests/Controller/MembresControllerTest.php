<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MembresControllerTest extends WebTestCase
{
    public function testGetmembres()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'membres');
    }

    public function testGetmembre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'membres/{id}');
    }

    public function testPostmembre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'membres');
    }

    public function testDeletemembre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'membres/{id}');
    }

    public function testUpdatemembre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'membres/{id}');
    }

}
