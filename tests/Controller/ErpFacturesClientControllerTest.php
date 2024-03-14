<?php

namespace App\Test\Controller;

use App\Entity\ErpFacturesClient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpFacturesClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/factures/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpFacturesClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpFacturesClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_factures_client[code]' => 'Testing',
            'erp_factures_client[monlogo]' => 'Testing',
            'erp_factures_client[masociete]' => 'Testing',
            'erp_factures_client[monadresse]' => 'Testing',
            'erp_factures_client[montel]' => 'Testing',
            'erp_factures_client[nomclient]' => 'Testing',
            'erp_factures_client[adresse]' => 'Testing',
            'erp_factures_client[telclient]' => 'Testing',
            'erp_factures_client[codedevis]' => 'Testing',
            'erp_factures_client[datedevis]' => 'Testing',
            'erp_factures_client[totalht]' => 'Testing',
            'erp_factures_client[totaltva]' => 'Testing',
            'erp_factures_client[totalttc]' => 'Testing',
            'erp_factures_client[creepar]' => 'Testing',
            'erp_factures_client[datecreation]' => 'Testing',
            'erp_factures_client[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFacturesClient();
        $fixture->setCode('My Title');
        $fixture->setMonlogo('My Title');
        $fixture->setMasociete('My Title');
        $fixture->setMonadresse('My Title');
        $fixture->setMontel('My Title');
        $fixture->setNomclient('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTelclient('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setDatedevis('My Title');
        $fixture->setTotalht('My Title');
        $fixture->setTotaltva('My Title');
        $fixture->setTotalttc('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpFacturesClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFacturesClient();
        $fixture->setCode('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setCodedevis('Value');
        $fixture->setDatedevis('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_factures_client[code]' => 'Something New',
            'erp_factures_client[monlogo]' => 'Something New',
            'erp_factures_client[masociete]' => 'Something New',
            'erp_factures_client[monadresse]' => 'Something New',
            'erp_factures_client[montel]' => 'Something New',
            'erp_factures_client[nomclient]' => 'Something New',
            'erp_factures_client[adresse]' => 'Something New',
            'erp_factures_client[telclient]' => 'Something New',
            'erp_factures_client[codedevis]' => 'Something New',
            'erp_factures_client[datedevis]' => 'Something New',
            'erp_factures_client[totalht]' => 'Something New',
            'erp_factures_client[totaltva]' => 'Something New',
            'erp_factures_client[totalttc]' => 'Something New',
            'erp_factures_client[creepar]' => 'Something New',
            'erp_factures_client[datecreation]' => 'Something New',
            'erp_factures_client[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/factures/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getMonlogo());
        self::assertSame('Something New', $fixture[0]->getMasociete());
        self::assertSame('Something New', $fixture[0]->getMonadresse());
        self::assertSame('Something New', $fixture[0]->getMontel());
        self::assertSame('Something New', $fixture[0]->getNomclient());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTelclient());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getDatedevis());
        self::assertSame('Something New', $fixture[0]->getTotalht());
        self::assertSame('Something New', $fixture[0]->getTotaltva());
        self::assertSame('Something New', $fixture[0]->getTotalttc());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFacturesClient();
        $fixture->setCode('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setCodedevis('Value');
        $fixture->setDatedevis('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/factures/client/');
        self::assertSame(0, $this->repository->count([]));
    }
}
