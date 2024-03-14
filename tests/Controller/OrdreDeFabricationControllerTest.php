<?php

namespace App\Test\Controller;

use App\Entity\OrdreDeFabrication;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrdreDeFabricationControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/ordre/de/fabrication/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(OrdreDeFabrication::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OrdreDeFabrication index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'ordre_de_fabrication[code]' => 'Testing',
            'ordre_de_fabrication[codeordre]' => 'Testing',
            'ordre_de_fabrication[nom]' => 'Testing',
            'ordre_de_fabrication[priorite]' => 'Testing',
            'ordre_de_fabrication[client]' => 'Testing',
            'ordre_de_fabrication[commandeclient]' => 'Testing',
            'ordre_de_fabrication[etat]' => 'Testing',
            'ordre_de_fabrication[creepar]' => 'Testing',
            'ordre_de_fabrication[datecreation]' => 'Testing',
            'ordre_de_fabrication[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new OrdreDeFabrication();
        $fixture->setCode('My Title');
        $fixture->setCodeordre('My Title');
        $fixture->setNom('My Title');
        $fixture->setPriorite('My Title');
        $fixture->setClient('My Title');
        $fixture->setCommandeclient('My Title');
        $fixture->setEtat('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OrdreDeFabrication');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new OrdreDeFabrication();
        $fixture->setCode('Value');
        $fixture->setCodeordre('Value');
        $fixture->setNom('Value');
        $fixture->setPriorite('Value');
        $fixture->setClient('Value');
        $fixture->setCommandeclient('Value');
        $fixture->setEtat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'ordre_de_fabrication[code]' => 'Something New',
            'ordre_de_fabrication[codeordre]' => 'Something New',
            'ordre_de_fabrication[nom]' => 'Something New',
            'ordre_de_fabrication[priorite]' => 'Something New',
            'ordre_de_fabrication[client]' => 'Something New',
            'ordre_de_fabrication[commandeclient]' => 'Something New',
            'ordre_de_fabrication[etat]' => 'Something New',
            'ordre_de_fabrication[creepar]' => 'Something New',
            'ordre_de_fabrication[datecreation]' => 'Something New',
            'ordre_de_fabrication[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/ordre/de/fabrication/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeordre());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPriorite());
        self::assertSame('Something New', $fixture[0]->getClient());
        self::assertSame('Something New', $fixture[0]->getCommandeclient());
        self::assertSame('Something New', $fixture[0]->getEtat());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new OrdreDeFabrication();
        $fixture->setCode('Value');
        $fixture->setCodeordre('Value');
        $fixture->setNom('Value');
        $fixture->setPriorite('Value');
        $fixture->setClient('Value');
        $fixture->setCommandeclient('Value');
        $fixture->setEtat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/ordre/de/fabrication/');
        self::assertSame(0, $this->repository->count([]));
    }
}
