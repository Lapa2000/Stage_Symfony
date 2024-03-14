<?php

namespace App\Test\Controller;

use App\Entity\Masociete;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MasocieteControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/masociete/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Masociete::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Masociete index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'masociete[code]' => 'Testing',
            'masociete[nom]' => 'Testing',
            'masociete[adresse]' => 'Testing',
            'masociete[tel]' => 'Testing',
            'masociete[fax]' => 'Testing',
            'masociete[mobile]' => 'Testing',
            'masociete[codefinance]' => 'Testing',
            'masociete[codebancaire]' => 'Testing',
            'masociete[email]' => 'Testing',
            'masociete[website]' => 'Testing',
            'masociete[logo]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Masociete();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTel('My Title');
        $fixture->setFax('My Title');
        $fixture->setMobile('My Title');
        $fixture->setCodefinance('My Title');
        $fixture->setCodebancaire('My Title');
        $fixture->setEmail('My Title');
        $fixture->setWebsite('My Title');
        $fixture->setLogo('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Masociete');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Masociete();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setFax('Value');
        $fixture->setMobile('Value');
        $fixture->setCodefinance('Value');
        $fixture->setCodebancaire('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setLogo('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'masociete[code]' => 'Something New',
            'masociete[nom]' => 'Something New',
            'masociete[adresse]' => 'Something New',
            'masociete[tel]' => 'Something New',
            'masociete[fax]' => 'Something New',
            'masociete[mobile]' => 'Something New',
            'masociete[codefinance]' => 'Something New',
            'masociete[codebancaire]' => 'Something New',
            'masociete[email]' => 'Something New',
            'masociete[website]' => 'Something New',
            'masociete[logo]' => 'Something New',
        ]);

        self::assertResponseRedirects('/masociete/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getMobile());
        self::assertSame('Something New', $fixture[0]->getCodefinance());
        self::assertSame('Something New', $fixture[0]->getCodebancaire());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getWebsite());
        self::assertSame('Something New', $fixture[0]->getLogo());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Masociete();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setFax('Value');
        $fixture->setMobile('Value');
        $fixture->setCodefinance('Value');
        $fixture->setCodebancaire('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setLogo('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/masociete/');
        self::assertSame(0, $this->repository->count([]));
    }
}
