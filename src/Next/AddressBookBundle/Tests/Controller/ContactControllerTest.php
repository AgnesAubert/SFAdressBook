<?php

namespace Next\AddressBookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testLister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/ajouter');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/modifier/{idcontact}');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/supprimer/{idcontact}');
    }

    public function testListerparsociete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/societe/{idsociete}');
    }

    public function testListerpargroupe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/groupe/{nomgroupe}');
    }

}
