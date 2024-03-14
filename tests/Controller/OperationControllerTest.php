<?php

namespace App\Test\Controller;

use App\Entity\Operation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OperationControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/operation/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Operation::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Operation index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'operation[codeoperation]' => 'Testing',
            'operation[nom]' => 'Testing',
            'operation[tempsexecution]' => 'Testing',
            'operation[machine]' => 'Testing',
            'operation[gamme]' => 'Testing',
            'operation[creepar]' => 'Testing',
            'operation[datecreation]' => 'Testing',
            'operation[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Operation();
        $fixture->setCodeoperation('My Title');
        $fixture->setNom('My Title');
        $fixture->setTempsexecution('My Title');
        $fixture->setMachine('My Title');
        $fixture->setGamme('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Operation');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Operation();
        $fixture->setCodeoperation('Value');
        $fixture->setNom('Value');
        $fixture->setTempsexecution('Value');
        $fixture->setMachine('Value');
        $fixture->setGamme('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'operation[codeoperation]' => 'Something New',
            'operation[nom]' => 'Something New',
            'operation[tempsexecution]' => 'Something New',
            'operation[machine]' => 'Something New',
            'operation[gamme]' => 'Something New',
            'operation[creepar]' => 'Something New',
            'operation[datecreation]' => 'Something New',
            'operation[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/operation/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCodeoperation());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getTempsexecution());
        self::assertSame('Something New', $fixture[0]->getMachine());
        self::assertSame('Something New', $fixture[0]->getGamme());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Operation();
        $fixture->setCodeoperation('Value');
        $fixture->setNom('Value');
        $fixture->setTempsexecution('Value');
        $fixture->setMachine('Value');
        $fixture->setGamme('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/operation/');
        self::assertSame(0, $this->repository->count([]));
    }
}
