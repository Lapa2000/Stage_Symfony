<?php

namespace App\Test\Controller;

use App\Entity\Formations;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormationsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/formations/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Formations::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Formation index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'formation[code]' => 'Testing',
            'formation[titre]' => 'Testing',
            'formation[description]' => 'Testing',
            'formation[idemp]' => 'Testing',
            'formation[datedebut]' => 'Testing',
            'formation[fichier]' => 'Testing',
            'formation[creepar]' => 'Testing',
            'formation[datecreation]' => 'Testing',
            'formation[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Formations();
        $fixture->setCode('My Title');
        $fixture->setTitre('My Title');
        $fixture->setDescription('My Title');
        $fixture->setIdemp('My Title');
        $fixture->setDatedebut('My Title');
        $fixture->setFichier('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Formation');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Formations();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setIdemp('Value');
        $fixture->setDatedebut('Value');
        $fixture->setFichier('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'formation[code]' => 'Something New',
            'formation[titre]' => 'Something New',
            'formation[description]' => 'Something New',
            'formation[idemp]' => 'Something New',
            'formation[datedebut]' => 'Something New',
            'formation[fichier]' => 'Something New',
            'formation[creepar]' => 'Something New',
            'formation[datecreation]' => 'Something New',
            'formation[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/formations/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getIdemp());
        self::assertSame('Something New', $fixture[0]->getDatedebut());
        self::assertSame('Something New', $fixture[0]->getFichier());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Formations();
        $fixture->setCode('Value');
        $fixture->setTitre('Value');
        $fixture->setDescription('Value');
        $fixture->setIdemp('Value');
        $fixture->setDatedebut('Value');
        $fixture->setFichier('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/formations/');
        self::assertSame(0, $this->repository->count([]));
    }
}
