<?php

namespace App\Test\Controller;

use App\Entity\Mouvement;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MouvementControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/mouvement/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Mouvement::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Mouvement index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'mouvement[code]' => 'Testing',
            'mouvement[codeproduit]' => 'Testing',
            'mouvement[operation]' => 'Testing',
            'mouvement[ancienvaleur]' => 'Testing',
            'mouvement[nouvellevaleur]' => 'Testing',
            'mouvement[creepar]' => 'Testing',
            'mouvement[datecreation]' => 'Testing',
            'mouvement[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Mouvement();
        $fixture->setCode('My Title');
        $fixture->setCodeproduit('My Title');
        $fixture->setOperation('My Title');
        $fixture->setAncienvaleur('My Title');
        $fixture->setNouvellevaleur('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Mouvement');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Mouvement();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setOperation('Value');
        $fixture->setAncienvaleur('Value');
        $fixture->setNouvellevaleur('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'mouvement[code]' => 'Something New',
            'mouvement[codeproduit]' => 'Something New',
            'mouvement[operation]' => 'Something New',
            'mouvement[ancienvaleur]' => 'Something New',
            'mouvement[nouvellevaleur]' => 'Something New',
            'mouvement[creepar]' => 'Something New',
            'mouvement[datecreation]' => 'Something New',
            'mouvement[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/mouvement/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeproduit());
        self::assertSame('Something New', $fixture[0]->getOperation());
        self::assertSame('Something New', $fixture[0]->getAncienvaleur());
        self::assertSame('Something New', $fixture[0]->getNouvellevaleur());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Mouvement();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setOperation('Value');
        $fixture->setAncienvaleur('Value');
        $fixture->setNouvellevaleur('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/mouvement/');
        self::assertSame(0, $this->repository->count([]));
    }
}
