<?php

namespace App\Test\Controller;

use App\Entity\ErpVehicule;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpVehiculeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/vehicule/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpVehicule::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpVehicule index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_vehicule[code]' => 'Testing',
            'erp_vehicule[image]' => 'Testing',
            'erp_vehicule[nom]' => 'Testing',
            'erp_vehicule[matricule]' => 'Testing',
            'erp_vehicule[modele]' => 'Testing',
            'erp_vehicule[dateachat]' => 'Testing',
            'erp_vehicule[datemiseensirculation]' => 'Testing',
            'erp_vehicule[creepar]' => 'Testing',
            'erp_vehicule[datecreation]' => 'Testing',
            'erp_vehicule[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpVehicule();
        $fixture->setCode('My Title');
        $fixture->setImage('My Title');
        $fixture->setNom('My Title');
        $fixture->setMatricule('My Title');
        $fixture->setModele('My Title');
        $fixture->setDateachat('My Title');
        $fixture->setDatemiseensirculation('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpVehicule');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpVehicule();
        $fixture->setCode('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setMatricule('Value');
        $fixture->setModele('Value');
        $fixture->setDateachat('Value');
        $fixture->setDatemiseensirculation('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_vehicule[code]' => 'Something New',
            'erp_vehicule[image]' => 'Something New',
            'erp_vehicule[nom]' => 'Something New',
            'erp_vehicule[matricule]' => 'Something New',
            'erp_vehicule[modele]' => 'Something New',
            'erp_vehicule[dateachat]' => 'Something New',
            'erp_vehicule[datemiseensirculation]' => 'Something New',
            'erp_vehicule[creepar]' => 'Something New',
            'erp_vehicule[datecreation]' => 'Something New',
            'erp_vehicule[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/vehicule/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getMatricule());
        self::assertSame('Something New', $fixture[0]->getModele());
        self::assertSame('Something New', $fixture[0]->getDateachat());
        self::assertSame('Something New', $fixture[0]->getDatemiseensirculation());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpVehicule();
        $fixture->setCode('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setMatricule('Value');
        $fixture->setModele('Value');
        $fixture->setDateachat('Value');
        $fixture->setDatemiseensirculation('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/vehicule/');
        self::assertSame(0, $this->repository->count([]));
    }
}
