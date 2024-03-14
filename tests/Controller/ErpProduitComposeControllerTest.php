<?php

namespace App\Test\Controller;

use App\Entity\ErpProduitCompose;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpProduitComposeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/produit/compose/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpProduitCompose::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpProduitCompose index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_produit_compose[code]' => 'Testing',
            'erp_produit_compose[codeproduit]' => 'Testing',
            'erp_produit_compose[image]' => 'Testing',
            'erp_produit_compose[nom]' => 'Testing',
            'erp_produit_compose[description]' => 'Testing',
            'erp_produit_compose[type]' => 'Testing',
            'erp_produit_compose[categorie]' => 'Testing',
            'erp_produit_compose[methodeapprovisionement]' => 'Testing',
            'erp_produit_compose[prixachatht]' => 'Testing',
            'erp_produit_compose[prixventeht]' => 'Testing',
            'erp_produit_compose[unitestock]' => 'Testing',
            'erp_produit_compose[fournisseur]' => 'Testing',
            'erp_produit_compose[dateachat]' => 'Testing',
            'erp_produit_compose[creepar]' => 'Testing',
            'erp_produit_compose[datecreation]' => 'Testing',
            'erp_produit_compose[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpProduitCompose();
        $fixture->setCode('My Title');
        $fixture->setCodeproduit('My Title');
        $fixture->setImage('My Title');
        $fixture->setNom('My Title');
        $fixture->setDescription('My Title');
        $fixture->setType('My Title');
        $fixture->setCategorie('My Title');
        $fixture->setMethodeapprovisionement('My Title');
        $fixture->setPrixachatht('My Title');
        $fixture->setPrixventeht('My Title');
        $fixture->setUnitestock('My Title');
        $fixture->setFournisseur('My Title');
        $fixture->setDateachat('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpProduitCompose');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpProduitCompose();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPrixachatht('Value');
        $fixture->setPrixventeht('Value');
        $fixture->setUnitestock('Value');
        $fixture->setFournisseur('Value');
        $fixture->setDateachat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_produit_compose[code]' => 'Something New',
            'erp_produit_compose[codeproduit]' => 'Something New',
            'erp_produit_compose[image]' => 'Something New',
            'erp_produit_compose[nom]' => 'Something New',
            'erp_produit_compose[description]' => 'Something New',
            'erp_produit_compose[type]' => 'Something New',
            'erp_produit_compose[categorie]' => 'Something New',
            'erp_produit_compose[methodeapprovisionement]' => 'Something New',
            'erp_produit_compose[prixachatht]' => 'Something New',
            'erp_produit_compose[prixventeht]' => 'Something New',
            'erp_produit_compose[unitestock]' => 'Something New',
            'erp_produit_compose[fournisseur]' => 'Something New',
            'erp_produit_compose[dateachat]' => 'Something New',
            'erp_produit_compose[creepar]' => 'Something New',
            'erp_produit_compose[datecreation]' => 'Something New',
            'erp_produit_compose[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/produit/compose/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeproduit());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getCategorie());
        self::assertSame('Something New', $fixture[0]->getMethodeapprovisionement());
        self::assertSame('Something New', $fixture[0]->getPrixachatht());
        self::assertSame('Something New', $fixture[0]->getPrixventeht());
        self::assertSame('Something New', $fixture[0]->getUnitestock());
        self::assertSame('Something New', $fixture[0]->getFournisseur());
        self::assertSame('Something New', $fixture[0]->getDateachat());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpProduitCompose();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPrixachatht('Value');
        $fixture->setPrixventeht('Value');
        $fixture->setUnitestock('Value');
        $fixture->setFournisseur('Value');
        $fixture->setDateachat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/produit/compose/');
        self::assertSame(0, $this->repository->count([]));
    }
}
