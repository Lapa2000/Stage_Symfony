<?php

namespace App\Test\Controller;

use App\Entity\ErpNoteDeFrais;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpNoteDeFraisControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/note/de/frais/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpNoteDeFrais::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpNoteDeFrai index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_note_de_frai[code]' => 'Testing',
            'erp_note_de_frai[titre]' => 'Testing',
            'erp_note_de_frai[description]' => 'Testing',
            'erp_note_de_frai[codeemployee]' => 'Testing',
            'erp_note_de_frai[datedebut]' => 'Testing',
            'erp_note_de_frai[datefin]' => 'Testing',
            'erp_note_de_frai[categorie]' => 'Testing',
            'erp_note_de_frai[etat]' => 'Testing',
            'erp_note_de_frai[creepar]' => 'Testing',
            'erp_note_de_frai[datecreation]' => 'Testing',
            'erp_note_de_frai[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpNoteDeFrais();
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
        self::assertPageTitleContains('ErpNoteDeFrai');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpNoteDeFrais();
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
            'erp_note_de_frai[code]' => 'Something New',
            'erp_note_de_frai[titre]' => 'Something New',
            'erp_note_de_frai[description]' => 'Something New',
            'erp_note_de_frai[codeemployee]' => 'Something New',
            'erp_note_de_frai[datedebut]' => 'Something New',
            'erp_note_de_frai[datefin]' => 'Something New',
            'erp_note_de_frai[categorie]' => 'Something New',
            'erp_note_de_frai[etat]' => 'Something New',
            'erp_note_de_frai[creepar]' => 'Something New',
            'erp_note_de_frai[datecreation]' => 'Something New',
            'erp_note_de_frai[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/note/de/frais/');

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
        $fixture = new ErpNoteDeFrais();
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

        self::assertResponseRedirects('/erp/note/de/frais/');
        self::assertSame(0, $this->repository->count([]));
    }
}
