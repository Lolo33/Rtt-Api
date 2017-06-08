<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatutControllerTest extends WebTestCase
{
    public function testListestatut()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'statuts');
    }

    public function testGetstatut()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'statuts/{statut_id}');
    }

}
