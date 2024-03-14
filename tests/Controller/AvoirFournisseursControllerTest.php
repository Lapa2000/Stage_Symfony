<?php

namespace App\Test\Controller;

use App\Entity\AvoirFournisseurs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvoirFournisseursControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/avoir/fournisseurs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(AvoirFournisseurs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AvoirFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'avoir_fournisseur[code]' => 'Testing',
            'avoir_fournisseur[codeavoir]' => 'Testing',
            'avoir_fournisseur[codefournisseur]' => 'Testing',
            'avoir_fournisseur[codefacture]' => 'Testing',
            'avoir_fournisseur[montantrestant]' => 'Testing',
            'avoir_fournisseur[datemontant]' => 'Testing',
            'avoir_fournisseur[creepar]' => 'Testing',
            'avoir_fournisseur[datecreation]' => 'Testing',
            'avoir_fournisseur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirFournisseurs();
        $fixture->setCode('My Title');
        $fixture->setCodeavoir('My Title');
        $fixture->setCodefournisseur('My Title');
        $fixture->setCodefacture('My Title');
        $fixture->setMontantrestant('My Title');
        $fixture->setDatemontant('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AvoirFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodeavoir('Value');
        $fixture->setCodefournisseur('Value');
        $fixture->setCodefacture('Value');
        $fixture->setMontantrestant('Value');
        $fixture->setDatemontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'avoir_fournisseur[code]' => 'Something New',
            'avoir_fournisseur[codeavoir]' => 'Something New',
            'avoir_fournisseur[codefournisseur]' => 'Something New',
            'avoir_fournisseur[codefacture]' => 'Something New',
            'avoir_fournisseur[montantrestant]' => 'Something New',
            'avoir_fournisseur[datemontant]' => 'Something New',
            'avoir_fournisseur[creepar]' => 'Something New',
            'avoir_fournisseur[datecreation]' => 'Something New',
            'avoir_fournisseur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/avoir/fournisseurs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeavoir());
        self::assertSame('Something New', $fixture[0]->getCodefournisseur());
        self::assertSame('Something New', $fixture[0]->getCodefacture());
        self::assertSame('Something New', $fixture[0]->getMontantrestant());
        self::assertSame('Something New', $fixture[0]->getDatemontant());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodeavoir('Value');
        $fixture->setCodefournisseur('Value');
        $fixture->setCodefacture('Value');
        $fixture->setMontantrestant('Value');
        $fixture->setDatemontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/avoir/fournisseurs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
