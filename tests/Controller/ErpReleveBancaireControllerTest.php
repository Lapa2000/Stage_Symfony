<?php

namespace App\Test\Controller;

use App\Entity\ErpReleveBancaire;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpReleveBancaireControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/releve/bancaire/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpReleveBancaire::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpReleveBancaire index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_releve_bancaire[code]' => 'Testing',
            'erp_releve_bancaire[solde]' => 'Testing',
            'erp_releve_bancaire[datesolde]' => 'Testing',
            'erp_releve_bancaire[fichierreleve]' => 'Testing',
            'erp_releve_bancaire[creepar]' => 'Testing',
            'erp_releve_bancaire[datecreation]' => 'Testing',
            'erp_releve_bancaire[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpReleveBancaire();
        $fixture->setCode('My Title');
        $fixture->setSolde('My Title');
        $fixture->setDatesolde('My Title');
        $fixture->setFichierreleve('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpReleveBancaire');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpReleveBancaire();
        $fixture->setCode('Value');
        $fixture->setSolde('Value');
        $fixture->setDatesolde('Value');
        $fixture->setFichierreleve('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_releve_bancaire[code]' => 'Something New',
            'erp_releve_bancaire[solde]' => 'Something New',
            'erp_releve_bancaire[datesolde]' => 'Something New',
            'erp_releve_bancaire[fichierreleve]' => 'Something New',
            'erp_releve_bancaire[creepar]' => 'Something New',
            'erp_releve_bancaire[datecreation]' => 'Something New',
            'erp_releve_bancaire[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/releve/bancaire/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getSolde());
        self::assertSame('Something New', $fixture[0]->getDatesolde());
        self::assertSame('Something New', $fixture[0]->getFichierreleve());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpReleveBancaire();
        $fixture->setCode('Value');
        $fixture->setSolde('Value');
        $fixture->setDatesolde('Value');
        $fixture->setFichierreleve('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/releve/bancaire/');
        self::assertSame(0, $this->repository->count([]));
    }
}
