<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EquipesControllerTest extends WebTestCase
{
    public function testGetequipes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'equipes');
    }

    public function testGetequipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'equipes/{id}');
    }

    public function testRemoveequipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'equipes/{id}');
    }

    public function testPostequipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'equipes');
    }

    public function testUpdateequipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'equipes');
    }

}
