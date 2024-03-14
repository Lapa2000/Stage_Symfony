<?php

namespace App\Test\Controller;

use App\Entity\ErpContratVehicule;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpContratVehiculeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/contrat/vehicule/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpContratVehicule::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpContratVehicule index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_contrat_vehicule[code]' => 'Testing',
            'erp_contrat_vehicule[titre]' => 'Testing',
            'erp_contrat_vehicule[description]' => 'Testing',
            'erp_contrat_vehicule[typecontrat]' => 'Testing',
            'erp_contrat_vehicule[datedebut]' => 'Testing',
            'erp_contrat_vehicule[datefin]' => 'Testing',
            'erp_contrat_vehicule[montant]' => 'Testing',
            'erp_contrat_vehicule[fichierjoint]' => 'Testing',
            'erp_contrat_vehicule[idvehicule]' => 'Testing',
            'erp_contrat_vehicule[creepar]' => 'Testing',
            'erp_contrat_vehicule[datecreation]' => 'Testing',
            'erp_contrat_vehicule[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpContratVehicule();
        $fixture->setCode('My Title');
        $fixture->setTitre('My Title');
        $fixture->setDescription('My Title');
        $fixture->setTypecontrat('My Title');
        $fixture->setDatedebut('My Title');
        $fixture->setDatefin('My Title');
        $fixture->setMontant('My Title');
        $fixture->setFichierjoint('My Title');
        $fixture->setIdvehicule('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpContratVehicule');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpContratVehicule();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setTypecontrat('Value');
        $fixture->setDatedebut('Value');
        $fixture->setDatefin('Value');
        $fixture->setMontant('Value');
        $fixture->setFichierjoint('Value');
        $fixture->setIdvehicule('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_contrat_vehicule[code]' => 'Something New',
            'erp_contrat_vehicule[titre]' => 'Something New',
            'erp_contrat_vehicule[description]' => 'Something New',
            'erp_contrat_vehicule[typecontrat]' => 'Something New',
            'erp_contrat_vehicule[datedebut]' => 'Something New',
            'erp_contrat_vehicule[datefin]' => 'Something New',
            'erp_contrat_vehicule[montant]' => 'Something New',
            'erp_contrat_vehicule[fichierjoint]' => 'Something New',
            'erp_contrat_vehicule[idvehicule]' => 'Something New',
            'erp_contrat_vehicule[creepar]' => 'Something New',
            'erp_contrat_vehicule[datecreation]' => 'Something New',
            'erp_contrat_vehicule[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/contrat/vehicule/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getTypecontrat());
        self::assertSame('Something New', $fixture[0]->getDatedebut());
        self::assertSame('Something New', $fixture[0]->getDatefin());
        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getFichierjoint());
        self::assertSame('Something New', $fixture[0]->getIdvehicule());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpContratVehicule();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setTypecontrat('Value');
        $fixture->setDatedebut('Value');
        $fixture->setDatefin('Value');
        $fixture->setMontant('Value');
        $fixture->setFichierjoint('Value');
        $fixture->setIdvehicule('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/contrat/vehicule/');
        self::assertSame(0, $this->repository->count([]));
    }
}
