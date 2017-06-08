<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiUserControllerTest extends WebTestCase
{
    public function testGetapiusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'apiusers');
    }

    public function testGetapiuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'apiusers');
    }

    public function testPostapiuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'apiusers');
    }

    public function testDeleteapiuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'apiusers');
    }

    public function testUpdateapiuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'apiusers');
    }

}
