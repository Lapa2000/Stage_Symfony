<?php

namespace App\Test\Controller;

use App\Entity\ContratFournisseur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContratFournisseurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/contrat/fournisseur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ContratFournisseur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ContratFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'contrat_fournisseur[code]' => 'Testing',
            'contrat_fournisseur[nom]' => 'Testing',
            'contrat_fournisseur[description]' => 'Testing',
            'contrat_fournisseur[fichier]' => 'Testing',
            'contrat_fournisseur[creepar]' => 'Testing',
            'contrat_fournisseur[datecreation]' => 'Testing',
            'contrat_fournisseur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ContratFournisseur();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setDescription('My Title');
        $fixture->setFichier('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ContratFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ContratFournisseur();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setFichier('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'contrat_fournisseur[code]' => 'Something New',
            'contrat_fournisseur[nom]' => 'Something New',
            'contrat_fournisseur[description]' => 'Something New',
            'contrat_fournisseur[fichier]' => 'Something New',
            'contrat_fournisseur[creepar]' => 'Something New',
            'contrat_fournisseur[datecreation]' => 'Something New',
            'contrat_fournisseur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/contrat/fournisseur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getFichier());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ContratFournisseur();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setFichier('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/contrat/fournisseur/');
        self::assertSame(0, $this->repository->count([]));
    }
}
