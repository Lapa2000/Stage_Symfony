<?php

namespace App\Test\Controller;

use App\Entity\FactureAutresNewData;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FactureAutresNewDataControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/facture/autres/new/data/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(FactureAutresNewData::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FactureAutresNewDatum index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'facture_autres_new_datum[code]' => 'Testing',
            'facture_autres_new_datum[nomclient]' => 'Testing',
            'facture_autres_new_datum[adresse]' => 'Testing',
            'facture_autres_new_datum[telclient]' => 'Testing',
            'facture_autres_new_datum[totalht]' => 'Testing',
            'facture_autres_new_datum[totaltva]' => 'Testing',
            'facture_autres_new_datum[totalttc]' => 'Testing',
            'facture_autres_new_datum[creepar]' => 'Testing',
            'facture_autres_new_datum[datecreation]' => 'Testing',
            'facture_autres_new_datum[datemodification]' => 'Testing',
            'facture_autres_new_datum[type]' => 'Testing',
            'facture_autres_new_datum[etat]' => 'Testing',
            'facture_autres_new_datum[typepaiment]' => 'Testing',
            'facture_autres_new_datum[numerocheque]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new FactureAutresNewData();
        $fixture->setCode('My Title');
        $fixture->setNomclient('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTelclient('My Title');
        $fixture->setTotalht('My Title');
        $fixture->setTotaltva('My Title');
        $fixture->setTotalttc('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');
        $fixture->setType('My Title');
        $fixture->setEtat('My Title');
        $fixture->setTypepaiment('My Title');
        $fixture->setNumerocheque('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FactureAutresNewDatum');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new FactureAutresNewData();
        $fixture->setCode('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');
        $fixture->setType('Value');
        $fixture->setEtat('Value');
        $fixture->setTypepaiment('Value');
        $fixture->setNumerocheque('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'facture_autres_new_datum[code]' => 'Something New',
            'facture_autres_new_datum[nomclient]' => 'Something New',
            'facture_autres_new_datum[adresse]' => 'Something New',
            'facture_autres_new_datum[telclient]' => 'Something New',
            'facture_autres_new_datum[totalht]' => 'Something New',
            'facture_autres_new_datum[totaltva]' => 'Something New',
            'facture_autres_new_datum[totalttc]' => 'Something New',
            'facture_autres_new_datum[creepar]' => 'Something New',
            'facture_autres_new_datum[datecreation]' => 'Something New',
            'facture_autres_new_datum[datemodification]' => 'Something New',
            'facture_autres_new_datum[type]' => 'Something New',
            'facture_autres_new_datum[etat]' => 'Something New',
            'facture_autres_new_datum[typepaiment]' => 'Something New',
            'facture_autres_new_datum[numerocheque]' => 'Something New',
        ]);

        self::assertResponseRedirects('/facture/autres/new/data/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNomclient());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTelclient());
        self::assertSame('Something New', $fixture[0]->getTotalht());
        self::assertSame('Something New', $fixture[0]->getTotaltva());
        self::assertSame('Something New', $fixture[0]->getTotalttc());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getEtat());
        self::assertSame('Something New', $fixture[0]->getTypepaiment());
        self::assertSame('Something New', $fixture[0]->getNumerocheque());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new FactureAutresNewData();
        $fixture->setCode('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');
        $fixture->setType('Value');
        $fixture->setEtat('Value');
        $fixture->setTypepaiment('Value');
        $fixture->setNumerocheque('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/facture/autres/new/data/');
        self::assertSame(0, $this->repository->count([]));
    }
}
