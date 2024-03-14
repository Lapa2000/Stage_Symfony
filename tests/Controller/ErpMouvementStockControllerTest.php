<?php

namespace App\Test\Controller;

use App\Entity\ErpMouvementStock;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpMouvementStockControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/mouvement/stock/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpMouvementStock::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMouvementStock index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_mouvement_stock[code]' => 'Testing',
            'erp_mouvement_stock[codeproduit]' => 'Testing',
            'erp_mouvement_stock[ancienqte]' => 'Testing',
            'erp_mouvement_stock[newquantitetonne]' => 'Testing',
            'erp_mouvement_stock[newquantitequnto]' => 'Testing',
            'erp_mouvement_stock[newquantitekilo]' => 'Testing',
            'erp_mouvement_stock[newvalue]' => 'Testing',
            'erp_mouvement_stock[date]' => 'Testing',
            'erp_mouvement_stock[type]' => 'Testing',
            'erp_mouvement_stock[creepar]' => 'Testing',
            'erp_mouvement_stock[datecreation]' => 'Testing',
            'erp_mouvement_stock[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMouvementStock();
        $fixture->setCode('My Title');
        $fixture->setCodeproduit('My Title');
        $fixture->setAncienqte('My Title');
        $fixture->setNewquantitetonne('My Title');
        $fixture->setNewquantitequnto('My Title');
        $fixture->setNewquantitekilo('My Title');
        $fixture->setNewvalue('My Title');
        $fixture->setDate('My Title');
        $fixture->setType('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMouvementStock');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMouvementStock();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setAncienqte('Value');
        $fixture->setNewquantitetonne('Value');
        $fixture->setNewquantitequnto('Value');
        $fixture->setNewquantitekilo('Value');
        $fixture->setNewvalue('Value');
        $fixture->setDate('Value');
        $fixture->setType('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_mouvement_stock[code]' => 'Something New',
            'erp_mouvement_stock[codeproduit]' => 'Something New',
            'erp_mouvement_stock[ancienqte]' => 'Something New',
            'erp_mouvement_stock[newquantitetonne]' => 'Something New',
            'erp_mouvement_stock[newquantitequnto]' => 'Something New',
            'erp_mouvement_stock[newquantitekilo]' => 'Something New',
            'erp_mouvement_stock[newvalue]' => 'Something New',
            'erp_mouvement_stock[date]' => 'Something New',
            'erp_mouvement_stock[type]' => 'Something New',
            'erp_mouvement_stock[creepar]' => 'Something New',
            'erp_mouvement_stock[datecreation]' => 'Something New',
            'erp_mouvement_stock[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/mouvement/stock/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeproduit());
        self::assertSame('Something New', $fixture[0]->getAncienqte());
        self::assertSame('Something New', $fixture[0]->getNewquantitetonne());
        self::assertSame('Something New', $fixture[0]->getNewquantitequnto());
        self::assertSame('Something New', $fixture[0]->getNewquantitekilo());
        self::assertSame('Something New', $fixture[0]->getNewvalue());
        self::assertSame('Something New', $fixture[0]->getDate());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMouvementStock();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setAncienqte('Value');
        $fixture->setNewquantitetonne('Value');
        $fixture->setNewquantitequnto('Value');
        $fixture->setNewquantitekilo('Value');
        $fixture->setNewvalue('Value');
        $fixture->setDate('Value');
        $fixture->setType('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/mouvement/stock/');
        self::assertSame(0, $this->repository->count([]));
    }
}
