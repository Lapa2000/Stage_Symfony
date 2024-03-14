<?php

namespace App\Test\Controller;

use App\Entity\ErpLigneProduction;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpLigneProductionControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/ligne/production/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpLigneProduction::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneProduction index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_ligne_production[code]' => 'Testing',
            'erp_ligne_production[codeligne]' => 'Testing',
            'erp_ligne_production[refproduit]' => 'Testing',
            'erp_ligne_production[ancienqte]' => 'Testing',
            'erp_ligne_production[newqte]' => 'Testing',
            'erp_ligne_production[sortie]' => 'Testing',
            'erp_ligne_production[restant]' => 'Testing',
            'erp_ligne_production[dateligne]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneProduction();
        $fixture->setCode('My Title');
        $fixture->setCodeligne('My Title');
        $fixture->setRefproduit('My Title');
        $fixture->setAncienqte('My Title');
        $fixture->setNewqte('My Title');
        $fixture->setSortie('My Title');
        $fixture->setRestant('My Title');
        $fixture->setDateligne('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpLigneProduction');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneProduction();
        $fixture->setCode('Value');
        $fixture->setCodeligne('Value');
        $fixture->setRefproduit('Value');
        $fixture->setAncienqte('Value');
        $fixture->setNewqte('Value');
        $fixture->setSortie('Value');
        $fixture->setRestant('Value');
        $fixture->setDateligne('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_ligne_production[code]' => 'Something New',
            'erp_ligne_production[codeligne]' => 'Something New',
            'erp_ligne_production[refproduit]' => 'Something New',
            'erp_ligne_production[ancienqte]' => 'Something New',
            'erp_ligne_production[newqte]' => 'Something New',
            'erp_ligne_production[sortie]' => 'Something New',
            'erp_ligne_production[restant]' => 'Something New',
            'erp_ligne_production[dateligne]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/ligne/production/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeligne());
        self::assertSame('Something New', $fixture[0]->getRefproduit());
        self::assertSame('Something New', $fixture[0]->getAncienqte());
        self::assertSame('Something New', $fixture[0]->getNewqte());
        self::assertSame('Something New', $fixture[0]->getSortie());
        self::assertSame('Something New', $fixture[0]->getRestant());
        self::assertSame('Something New', $fixture[0]->getDateligne());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpLigneProduction();
        $fixture->setCode('Value');
        $fixture->setCodeligne('Value');
        $fixture->setRefproduit('Value');
        $fixture->setAncienqte('Value');
        $fixture->setNewqte('Value');
        $fixture->setSortie('Value');
        $fixture->setRestant('Value');
        $fixture->setDateligne('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/ligne/production/');
        self::assertSame(0, $this->repository->count([]));
    }
}
