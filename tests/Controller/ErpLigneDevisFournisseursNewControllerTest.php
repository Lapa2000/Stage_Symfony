<?php

namespace App\Test\Controller;

use App\Entity\ErpLigneDevisFournisseursNew;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpLigneDevisFournisseursNewControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/ligne/devis/fournisseurs/new/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpLigneDevisFournisseursNew::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneDevisFournisseursNew index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_ligne_devis_fournisseurs_new[code]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[codedevis]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[reference]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[produit]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[quantite]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[remise]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[tva]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[soustotalht]' => 'Testing',
            'erp_ligne_devis_fournisseurs_new[soustotalttc]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneDevisFournisseursNew();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setReference('My Title');
        $fixture->setProduit('My Title');
        $fixture->setQuantite('My Title');
        $fixture->setRemise('My Title');
        $fixture->setTva('My Title');
        $fixture->setSoustotalht('My Title');
        $fixture->setSoustotalttc('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneDevisFournisseursNew');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneDevisFournisseursNew();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setRemise('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_ligne_devis_fournisseurs_new[code]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[codedevis]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[reference]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[produit]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[quantite]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[remise]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[tva]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[soustotalht]' => 'Something New',
            'erp_ligne_devis_fournisseurs_new[soustotalttc]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/ligne/devis/fournisseurs/new/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getProduit());
        self::assertSame('Something New', $fixture[0]->getQuantite());
        self::assertSame('Something New', $fixture[0]->getRemise());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getSoustotalht());
        self::assertSame('Something New', $fixture[0]->getSoustotalttc());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneDevisFournisseursNew();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setReference('Value');
        $fixture->setProduit('Value');
        $fixture->setQuantite('Value');
        $fixture->setRemise('Value');
        $fixture->setTva('Value');
        $fixture->setSoustotalht('Value');
        $fixture->setSoustotalttc('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/ligne/devis/fournisseurs/new/');
        self::assertSame(0, $this->repository->count([]));
    }
}
