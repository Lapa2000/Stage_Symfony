<?php

namespace App\Test\Controller;

use App\Entity\ErpConsomationParc;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpConsomationParcControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/consomation/parc/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpConsomationParc::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpConsomationParc index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_consomation_parc[code]' => 'Testing',
            'erp_consomation_parc[codevehicule]' => 'Testing',
            'erp_consomation_parc[nombrelitre]' => 'Testing',
            'erp_consomation_parc[prix]' => 'Testing',
            'erp_consomation_parc[datesaisie]' => 'Testing',
            'erp_consomation_parc[creepar]' => 'Testing',
            'erp_consomation_parc[datecreation]' => 'Testing',
            'erp_consomation_parc[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpConsomationParc();
        $fixture->setCode('My Title');
        $fixture->setCodevehicule('My Title');
        $fixture->setNombrelitre('My Title');
        $fixture->setPrix('My Title');
        $fixture->setDatesaisie('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpConsomationParc');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpConsomationParc();
        $fixture->setCode('Value');
        $fixture->setCodevehicule('Value');
        $fixture->setNombrelitre('Value');
        $fixture->setPrix('Value');
        $fixture->setDatesaisie('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_consomation_parc[code]' => 'Something New',
            'erp_consomation_parc[codevehicule]' => 'Something New',
            'erp_consomation_parc[nombrelitre]' => 'Something New',
            'erp_consomation_parc[prix]' => 'Something New',
            'erp_consomation_parc[datesaisie]' => 'Something New',
            'erp_consomation_parc[creepar]' => 'Something New',
            'erp_consomation_parc[datecreation]' => 'Something New',
            'erp_consomation_parc[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/consomation/parc/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodevehicule());
        self::assertSame('Something New', $fixture[0]->getNombrelitre());
        self::assertSame('Something New', $fixture[0]->getPrix());
        self::assertSame('Something New', $fixture[0]->getDatesaisie());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpConsomationParc();
        $fixture->setCode('Value');
        $fixture->setCodevehicule('Value');
        $fixture->setNombrelitre('Value');
        $fixture->setPrix('Value');
        $fixture->setDatesaisie('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/consomation/parc/');
        self::assertSame(0, $this->repository->count([]));
    }
}
