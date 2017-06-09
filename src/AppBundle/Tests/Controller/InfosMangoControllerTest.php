<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfosMangoControllerTest extends WebTestCase
{
    public function testGetinfosmango()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'infos-mango');
    }

    public function testGetinfomango()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'infos-mango');
    }

    public function testPostinfomango()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'infos-mango');
    }

    public function testRemoveinfomango()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'infos-mango');
    }

    public function testUpdateinfomango()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'infos-mango');
    }

}
