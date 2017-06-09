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

        $crawler = $client->request('GET', 'avatars');
    }

    public function testPostavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars');
    }

    public function testRemoveavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'avatars');
    }

}
