<?php

namespace App\Test\Controller;

use App\Entity\FacturesFournisseurs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FacturesFournisseursControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/factures/fournisseurs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(FacturesFournisseurs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FacturesFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'factures_fournisseur[code]' => 'Testing',
            'factures_fournisseur[codedevis]' => 'Testing',
            'factures_fournisseur[monlogo]' => 'Testing',
            'factures_fournisseur[masociete]' => 'Testing',
            'factures_fournisseur[monadresse]' => 'Testing',
            'factures_fournisseur[montel]' => 'Testing',
            'factures_fournisseur[nomclient]' => 'Testing',
            'factures_fournisseur[adresse]' => 'Testing',
            'factures_fournisseur[telclient]' => 'Testing',
            'factures_fournisseur[datedevis]' => 'Testing',
            'factures_fournisseur[totalht]' => 'Testing',
            'factures_fournisseur[totaltva]' => 'Testing',
            'factures_fournisseur[totalttc]' => 'Testing',
            'factures_fournisseur[creepar]' => 'Testing',
            'factures_fournisseur[datecreation]' => 'Testing',
            'factures_fournisseur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new FacturesFournisseurs();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setMonlogo('My Title');
        $fixture->setMasociete('My Title');
        $fixture->setMonadresse('My Title');
        $fixture->setMontel('My Title');
        $fixture->setNomclient('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTelclient('My Title');
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
        self::assertPageTitleContains('FacturesFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new FacturesFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
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
            'factures_fournisseur[code]' => 'Something New',
            'factures_fournisseur[codedevis]' => 'Something New',
            'factures_fournisseur[monlogo]' => 'Something New',
            'factures_fournisseur[masociete]' => 'Something New',
            'factures_fournisseur[monadresse]' => 'Something New',
            'factures_fournisseur[montel]' => 'Something New',
            'factures_fournisseur[nomclient]' => 'Something New',
            'factures_fournisseur[adresse]' => 'Something New',
            'factures_fournisseur[telclient]' => 'Something New',
            'factures_fournisseur[datedevis]' => 'Something New',
            'factures_fournisseur[totalht]' => 'Something New',
            'factures_fournisseur[totaltva]' => 'Something New',
            'factures_fournisseur[totalttc]' => 'Something New',
            'factures_fournisseur[creepar]' => 'Something New',
            'factures_fournisseur[datecreation]' => 'Something New',
            'factures_fournisseur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/factures/fournisseurs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getMonlogo());
        self::assertSame('Something New', $fixture[0]->getMasociete());
        self::assertSame('Something New', $fixture[0]->getMonadresse());
        self::assertSame('Something New', $fixture[0]->getMontel());
        self::assertSame('Something New', $fixture[0]->getNomclient());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTelclient());
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
        $fixture = new FacturesFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
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

        self::assertResponseRedirects('/factures/fournisseurs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
