<?php

namespace App\Test\Controller;

use App\Entity\ErpAbsence;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpAbsenceControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/absence/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpAbsence::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpAbsence index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_absence[code]' => 'Testing',
            'erp_absence[titre]' => 'Testing',
            'erp_absence[description]' => 'Testing',
            'erp_absence[codeemployee]' => 'Testing',
            'erp_absence[datedebut]' => 'Testing',
            'erp_absence[datefin]' => 'Testing',
            'erp_absence[categorie]' => 'Testing',
            'erp_absence[etat]' => 'Testing',
            'erp_absence[creepar]' => 'Testing',
            'erp_absence[datecreation]' => 'Testing',
            'erp_absence[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpAbsence();
        $fixture->setCode('My Title');
        $fixture->setTitre('My Title');
        $fixture->setDescription('My Title');
        $fixture->setCodeemployee('My Title');
        $fixture->setDatedebut('My Title');
        $fixture->setDatefin('My Title');
        $fixture->setCategorie('My Title');
        $fixture->setEtat('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpAbsence');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpAbsence();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setCodeemployee('Value');
        $fixture->setDatedebut('Value');
        $fixture->setDatefin('Value');
        $fixture->setCategorie('Value');
        $fixture->setEtat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_absence[code]' => 'Something New',
            'erp_absence[titre]' => 'Something New',
            'erp_absence[description]' => 'Something New',
            'erp_absence[codeemployee]' => 'Something New',
            'erp_absence[datedebut]' => 'Something New',
            'erp_absence[datefin]' => 'Something New',
            'erp_absence[categorie]' => 'Something New',
            'erp_absence[etat]' => 'Something New',
            'erp_absence[creepar]' => 'Something New',
            'erp_absence[datecreation]' => 'Something New',
            'erp_absence[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/absence/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getCodeemployee());
        self::assertSame('Something New', $fixture[0]->getDatedebut());
        self::assertSame('Something New', $fixture[0]->getDatefin());
        self::assertSame('Something New', $fixture[0]->getCategorie());
        self::assertSame('Something New', $fixture[0]->getEtat());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpAbsence();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setCodeemployee('Value');
        $fixture->setDatedebut('Value');
        $fixture->setDatefin('Value');
        $fixture->setCategorie('Value');
        $fixture->setEtat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/absence/');
        self::assertSame(0, $this->repository->count([]));
    }
}
