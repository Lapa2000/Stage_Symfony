<?php

namespace App\Test\Controller;

use App\Entity\ErpLocationParc;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpLocationParcControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/location/parc/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpLocationParc::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLocationParc index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_location_parc[code]' => 'Testing',
            'erp_location_parc[titre]' => 'Testing',
            'erp_location_parc[description]' => 'Testing',
            'erp_location_parc[typecontrat]' => 'Testing',
            'erp_location_parc[datedebut]' => 'Testing',
            'erp_location_parc[datefin]' => 'Testing',
            'erp_location_parc[montant]' => 'Testing',
            'erp_location_parc[fichierjoint]' => 'Testing',
            'erp_location_parc[idvehicule]' => 'Testing',
            'erp_location_parc[creepar]' => 'Testing',
            'erp_location_parc[datecreation]' => 'Testing',
            'erp_location_parc[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLocationParc();
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
        self::assertPageTitleContains('ErpLocationParc');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLocationParc();
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
            'erp_location_parc[code]' => 'Something New',
            'erp_location_parc[titre]' => 'Something New',
            'erp_location_parc[description]' => 'Something New',
            'erp_location_parc[typecontrat]' => 'Something New',
            'erp_location_parc[datedebut]' => 'Something New',
            'erp_location_parc[datefin]' => 'Something New',
            'erp_location_parc[montant]' => 'Something New',
            'erp_location_parc[fichierjoint]' => 'Something New',
            'erp_location_parc[idvehicule]' => 'Something New',
            'erp_location_parc[creepar]' => 'Something New',
            'erp_location_parc[datecreation]' => 'Something New',
            'erp_location_parc[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/location/parc/');

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
        $fixture = new ErpLocationParc();
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

        self::assertResponseRedirects('/erp/location/parc/');
        self::assertSame(0, $this->repository->count([]));
    }
}
