<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DepartementsControllerControllerTest extends WebTestCase
{
    public function testGetdepartements()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'departements');
    }

}
