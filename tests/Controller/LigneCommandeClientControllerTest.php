<?php

namespace App\Test\Controller;

use App\Entity\LigneCommandeClient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LigneCommandeClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/ligne/commande/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(LigneCommandeClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LigneCommandeClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'ligne_commande_client[code]' => 'Testing',
            'ligne_commande_client[codedevis]' => 'Testing',
            'ligne_commande_client[reference]' => 'Testing',
            'ligne_commande_client[produit]' => 'Testing',
            'ligne_commande_client[quantite]' => 'Testing',
            'ligne_commande_client[prixdeventeht]' => 'Testing',
            'ligne_commande_client[remise]' => 'Testing',
            'ligne_commande_client[tva]' => 'Testing',
            'ligne_commande_client[soustotalht]' => 'Testing',
            'ligne_commande_client[soustotalttc]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneCommandeClient();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setReference('My Title');
        $fixture->setProduit('My Title');
        $fixture->setQuantite('My Title');
        $fixture->setPrixdeventeht('My Title');
        $fixture->setRemise('My Title');
        $fixture->setTva('My Title');
        $fixture->setSoustotalht('My Title');
        $fixture->setSoustotalttc('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LigneCommandeClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneCommandeClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixdeventeht('Value');
        $fixture->setRemise('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'ligne_commande_client[code]' => 'Something New',
            'ligne_commande_client[codedevis]' => 'Something New',
            'ligne_commande_client[reference]' => 'Something New',
            'ligne_commande_client[produit]' => 'Something New',
            'ligne_commande_client[quantite]' => 'Something New',
            'ligne_commande_client[prixdeventeht]' => 'Something New',
            'ligne_commande_client[remise]' => 'Something New',
            'ligne_commande_client[tva]' => 'Something New',
            'ligne_commande_client[soustotalht]' => 'Something New',
            'ligne_commande_client[soustotalttc]' => 'Something New',
        ]);

        self::assertResponseRedirects('/ligne/commande/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getProduit());
        self::assertSame('Something New', $fixture[0]->getQuantite());
        self::assertSame('Something New', $fixture[0]->getPrixdeventeht());
        self::assertSame('Something New', $fixture[0]->getRemise());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getSoustotalht());
        self::assertSame('Something New', $fixture[0]->getSoustotalttc());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new LigneCommandeClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setPrixdeventeht('Value');
        $fixture->setRemise('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/ligne/commande/client/');
        self::assertSame(0, $this->repository->count([]));
    }
}
