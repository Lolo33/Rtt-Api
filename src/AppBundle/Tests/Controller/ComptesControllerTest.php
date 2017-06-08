<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComptesControllerTest extends WebTestCase
{
    public function testGetcomptes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'comptes');
    }

    public function testGetcompte()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'comptes/{id}');
    }

    public function testPostcompte()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'comptes');
    }

    public function testRemovecompte()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'comptes/{id}');
    }

    public function testUpdatecompte()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'comptes/{id}');
    }

}
