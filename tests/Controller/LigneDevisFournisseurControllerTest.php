<?php

namespace App\Test\Controller;

use App\Entity\LigneDevisFournisseur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LigneDevisFournisseurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/ligne/devis/fournisseur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(LigneDevisFournisseur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LigneDevisFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'ligne_devis_fournisseur[code]' => 'Testing',
            'ligne_devis_fournisseur[codedevis]' => 'Testing',
            'ligne_devis_fournisseur[produit]' => 'Testing',
            'ligne_devis_fournisseur[prixunitaire]' => 'Testing',
            'ligne_devis_fournisseur[quantite]' => 'Testing',
            'ligne_devis_fournisseur[prixtotal]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneDevisFournisseur();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setProduit('My Title');
        $fixture->setPrixunitaire('My Title');
        $fixture->setQuantite('My Title');
        $fixture->setPrixtotal('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LigneDevisFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneDevisFournisseur();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setProduit('Value');
        $fixture->setPrixunitaire('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixtotal('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'ligne_devis_fournisseur[code]' => 'Something New',
            'ligne_devis_fournisseur[codedevis]' => 'Something New',
            'ligne_devis_fournisseur[produit]' => 'Something New',
            'ligne_devis_fournisseur[prixunitaire]' => 'Something New',
            'ligne_devis_fournisseur[quantite]' => 'Something New',
            'ligne_devis_fournisseur[prixtotal]' => 'Something New',
        ]);

        self::assertResponseRedirects('/ligne/devis/fournisseur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getProduit());
        self::assertSame('Something New', $fixture[0]->getPrixunitaire());
        self::assertSame('Something New', $fixture[0]->getQuantite());
        self::assertSame('Something New', $fixture[0]->getPrixtotal());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneDevisFournisseur();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setProduit('Value');
        $fixture->setPrixunitaire('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixtotal('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/ligne/devis/fournisseur/');
        self::assertSame(0, $this->repository->count([]));
    }
}
