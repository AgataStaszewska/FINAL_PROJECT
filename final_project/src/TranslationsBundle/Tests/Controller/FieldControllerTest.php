<?php

namespace TranslationsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FieldControllerTest extends WebTestCase
{
    public function testAddfield()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addField');
    }

    public function testDeletefield()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteField');
    }

    public function testShowallfields()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllFields');
    }

}
