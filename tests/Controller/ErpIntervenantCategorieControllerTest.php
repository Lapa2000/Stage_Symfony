<?php

namespace App\Test\Controller;

use App\Entity\ErpIntervenantCategorie;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpIntervenantCategorieControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/intervenant/categorie/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpIntervenantCategorie::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpIntervenantCategorie index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_intervenant_categorie[code]' => 'Testing',
            'erp_intervenant_categorie[nom]' => 'Testing',
            'erp_intervenant_categorie[creepar]' => 'Testing',
            'erp_intervenant_categorie[datecreation]' => 'Testing',
            'erp_intervenant_categorie[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpIntervenantCategorie();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpIntervenantCategorie');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpIntervenantCategorie();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_intervenant_categorie[code]' => 'Something New',
            'erp_intervenant_categorie[nom]' => 'Something New',
            'erp_intervenant_categorie[creepar]' => 'Something New',
            'erp_intervenant_categorie[datecreation]' => 'Something New',
            'erp_intervenant_categorie[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/intervenant/categorie/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpIntervenantCategorie();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/intervenant/categorie/');
        self::assertSame(0, $this->repository->count([]));
    }
}
