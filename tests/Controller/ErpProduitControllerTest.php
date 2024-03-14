<?php

namespace App\Test\Controller;

use App\Entity\ErpProduit;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpProduitControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/produit/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpProduit::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpProduit index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_produit[code]' => 'Testing',
            'erp_produit[codeproduit]' => 'Testing',
            'erp_produit[image]' => 'Testing',
            'erp_produit[nom]' => 'Testing',
            'erp_produit[description]' => 'Testing',
            'erp_produit[type]' => 'Testing',
            'erp_produit[categorie]' => 'Testing',
            'erp_produit[methodeapprovisionement]' => 'Testing',
            'erp_produit[puvht]' => 'Testing',
            'erp_produit[tva]' => 'Testing',
            'erp_produit[puvttc]' => 'Testing',
            'erp_produit[remise]' => 'Testing',
            'erp_produit[unitestock]' => 'Testing',
            'erp_produit[fournisseur]' => 'Testing',
            'erp_produit[dateachat]' => 'Testing',
            'erp_produit[creepar]' => 'Testing',
            'erp_produit[datecreation]' => 'Testing',
            'erp_produit[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpProduit();
        $fixture->setCode('My Title');
        $fixture->setCodeproduit('My Title');
        $fixture->setImage('My Title');
        $fixture->setNom('My Title');
        $fixture->setDescription('My Title');
        $fixture->setType('My Title');
        $fixture->setCategorie('My Title');
        $fixture->setMethodeapprovisionement('My Title');
        $fixture->setPuvht('My Title');
        $fixture->setTva('My Title');
        $fixture->setPuvttc('My Title');
        $fixture->setRemise('My Title');
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
        self::assertPageTitleContains('ErpProduit');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpProduit();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPuvht('Value');
        $fixture->setTva('Value');
        $fixture->setPuvttc('Value');
        $fixture->setRemise('Value');
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
            'erp_produit[code]' => 'Something New',
            'erp_produit[codeproduit]' => 'Something New',
            'erp_produit[image]' => 'Something New',
            'erp_produit[nom]' => 'Something New',
            'erp_produit[description]' => 'Something New',
            'erp_produit[type]' => 'Something New',
            'erp_produit[categorie]' => 'Something New',
            'erp_produit[methodeapprovisionement]' => 'Something New',
            'erp_produit[puvht]' => 'Something New',
            'erp_produit[tva]' => 'Something New',
            'erp_produit[puvttc]' => 'Something New',
            'erp_produit[remise]' => 'Something New',
            'erp_produit[unitestock]' => 'Something New',
            'erp_produit[fournisseur]' => 'Something New',
            'erp_produit[dateachat]' => 'Something New',
            'erp_produit[creepar]' => 'Something New',
            'erp_produit[datecreation]' => 'Something New',
            'erp_produit[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/produit/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeproduit());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getCategorie());
        self::assertSame('Something New', $fixture[0]->getMethodeapprovisionement());
        self::assertSame('Something New', $fixture[0]->getPuvht());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getPuvttc());
        self::assertSame('Something New', $fixture[0]->getRemise());
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
        $fixture = new ErpProduit();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPuvht('Value');
        $fixture->setTva('Value');
        $fixture->setPuvttc('Value');
        $fixture->setRemise('Value');
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

        self::assertResponseRedirects('/erp/produit/');
        self::assertSame(0, $this->repository->count([]));
    }
}
