<?php

namespace App\Test\Controller;

use App\Entity\Notedefrais;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NotedefraisControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/notedefrais/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Notedefrais::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Notedefrai index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'notedefrai[code]' => 'Testing',
            'notedefrai[codeemp]' => 'Testing',
            'notedefrai[titre]' => 'Testing',
            'notedefrai[description]' => 'Testing',
            'notedefrai[fichier]' => 'Testing',
            'notedefrai[montant]' => 'Testing',
            'notedefrai[creepar]' => 'Testing',
            'notedefrai[datecreation]' => 'Testing',
            'notedefrai[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Notedefrais();
        $fixture->setCode('My Title');
        $fixture->setCodeemp('My Title');
        $fixture->setTitre('My Title');
        $fixture->setDescription('My Title');
        $fixture->setFichier('My Title');
        $fixture->setMontant('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Notedefrai');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Notedefrais();
        $fixture->setCode('Value');
        $fixture->setCodeemp('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setFichier('Value');
        $fixture->setMontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'notedefrai[code]' => 'Something New',
            'notedefrai[codeemp]' => 'Something New',
            'notedefrai[titre]' => 'Something New',
            'notedefrai[description]' => 'Something New',
            'notedefrai[fichier]' => 'Something New',
            'notedefrai[montant]' => 'Something New',
            'notedefrai[creepar]' => 'Something New',
            'notedefrai[datecreation]' => 'Something New',
            'notedefrai[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/notedefrais/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeemp());
        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getFichier());
        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Notedefrais();
        $fixture->setCode('Value');
        $fixture->setCodeemp('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setFichier('Value');
        $fixture->setMontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/notedefrais/');
        self::assertSame(0, $this->repository->count([]));
    }
}
