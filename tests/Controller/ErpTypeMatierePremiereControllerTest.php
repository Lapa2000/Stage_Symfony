<?php

namespace App\Test\Controller;

use App\Entity\ErpTypeMatierePremiere;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpTypeMatierePremiereControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/type/matiere/premiere/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpTypeMatierePremiere::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpTypeMatierePremiere index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_type_matiere_premiere[code]' => 'Testing',
            'erp_type_matiere_premiere[nom]' => 'Testing',
            'erp_type_matiere_premiere[creepar]' => 'Testing',
            'erp_type_matiere_premiere[datecreation]' => 'Testing',
            'erp_type_matiere_premiere[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpTypeMatierePremiere();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpTypeMatierePremiere');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpTypeMatierePremiere();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_type_matiere_premiere[code]' => 'Something New',
            'erp_type_matiere_premiere[nom]' => 'Something New',
            'erp_type_matiere_premiere[creepar]' => 'Something New',
            'erp_type_matiere_premiere[datecreation]' => 'Something New',
            'erp_type_matiere_premiere[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/type/matiere/premiere/');

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
        $fixture = new ErpTypeMatierePremiere();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/type/matiere/premiere/');
        self::assertSame(0, $this->repository->count([]));
    }
}
