<?php

namespace App\Test\Controller;

use App\Entity\ErpChauffeurs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpChauffeursControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/chauffeurs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpChauffeurs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpChauffeur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_chauffeur[code]' => 'Testing',
            'erp_chauffeur[nom]' => 'Testing',
            'erp_chauffeur[prenom]' => 'Testing',
            'erp_chauffeur[adresse]' => 'Testing',
            'erp_chauffeur[tel]' => 'Testing',
            'erp_chauffeur[tel2]' => 'Testing',
            'erp_chauffeur[email]' => 'Testing',
            'erp_chauffeur[image]' => 'Testing',
            'erp_chauffeur[creepar]' => 'Testing',
            'erp_chauffeur[datecreation]' => 'Testing',
            'erp_chauffeur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpChauffeurs();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTel('My Title');
        $fixture->setTel2('My Title');
        $fixture->setEmail('My Title');
        $fixture->setImage('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpChauffeur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpChauffeurs();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setEmail('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_chauffeur[code]' => 'Something New',
            'erp_chauffeur[nom]' => 'Something New',
            'erp_chauffeur[prenom]' => 'Something New',
            'erp_chauffeur[adresse]' => 'Something New',
            'erp_chauffeur[tel]' => 'Something New',
            'erp_chauffeur[tel2]' => 'Something New',
            'erp_chauffeur[email]' => 'Something New',
            'erp_chauffeur[image]' => 'Something New',
            'erp_chauffeur[creepar]' => 'Something New',
            'erp_chauffeur[datecreation]' => 'Something New',
            'erp_chauffeur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/chauffeurs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getTel2());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpChauffeurs();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setEmail('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/chauffeurs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
