<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EvenementsControllerTest extends WebTestCase
{
    public function testGetevenementslieu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'evenements');
    }

    public function testGetevenementsdpt()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getEvenementsDpt');
    }

    public function testGetevenements()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getEvenements');
    }

    public function testGetevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getEvenement');
    }

    public function testPostevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postEvenement');
    }

    public function testRemoveevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeEvenement');
    }

    public function testUpdateevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateEvenement');
    }

}
