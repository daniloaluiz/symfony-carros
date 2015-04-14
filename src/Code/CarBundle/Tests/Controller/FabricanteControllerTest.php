<?php

namespace Code\CarBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FabricanteControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fabricantes');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fabricantes/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fabricantes/edit');
    }

}
