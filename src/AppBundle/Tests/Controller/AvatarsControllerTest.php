<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvatarsControllerTest extends WebTestCase
{
    public function testGetavatars()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars');
    }

    public function testGetavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars/{id}');
    }

    public function testPostavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars');
    }

    public function testDeleteavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars/{id}');
    }

    public function testUpdateavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars');
    }

}
