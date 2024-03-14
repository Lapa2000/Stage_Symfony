<?php

namespace App\Test\Controller;

use App\Entity\ErpLigneFacturesClient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpLigneFacturesClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/ligne/factures/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpLigneFacturesClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneFacturesClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_ligne_factures_client[code]' => 'Testing',
            'erp_ligne_factures_client[codedevis]' => 'Testing',
            'erp_ligne_factures_client[reference]' => 'Testing',
            'erp_ligne_factures_client[produit]' => 'Testing',
            'erp_ligne_factures_client[quantite]' => 'Testing',
            'erp_ligne_factures_client[prixdeventeht]' => 'Testing',
            'erp_ligne_factures_client[tva]' => 'Testing',
            'erp_ligne_factures_client[soustotalht]' => 'Testing',
            'erp_ligne_factures_client[soustotalttc]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneFacturesClient();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setReference('My Title');
        $fixture->setProduit('My Title');
        $fixture->setQuantite('My Title');
        $fixture->setPrixdeventeht('My Title');
        $fixture->setTva('My Title');
        $fixture->setSoustotalht('My Title');
        $fixture->setSoustotalttc('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneFacturesClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneFacturesClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixdeventeht('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_ligne_factures_client[code]' => 'Something New',
            'erp_ligne_factures_client[codedevis]' => 'Something New',
            'erp_ligne_factures_client[reference]' => 'Something New',
            'erp_ligne_factures_client[produit]' => 'Something New',
            'erp_ligne_factures_client[quantite]' => 'Something New',
            'erp_ligne_factures_client[prixdeventeht]' => 'Something New',
            'erp_ligne_factures_client[tva]' => 'Something New',
            'erp_ligne_factures_client[soustotalht]' => 'Something New',
            'erp_ligne_factures_client[soustotalttc]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/ligne/factures/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getProduit());
        self::assertSame('Something New', $fixture[0]->getQuantite());
        self::assertSame('Something New', $fixture[0]->getPrixdeventeht());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getSoustotalht());
        self::assertSame('Something New', $fixture[0]->getSoustotalttc());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneFacturesClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixdeventeht('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/ligne/factures/client/');
        self::assertSame(0, $this->repository->count([]));
    }
}
