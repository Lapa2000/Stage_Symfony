<?php

namespace App\Test\Controller;

use App\Entity\ErpEmploye;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpEmployeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/employe/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpEmploye::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpEmploye index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_employe[code]' => 'Testing',
            'erp_employe[nom]' => 'Testing',
            'erp_employe[prenom]' => 'Testing',
            'erp_employe[adresse]' => 'Testing',
            'erp_employe[tel]' => 'Testing',
            'erp_employe[tel2]' => 'Testing',
            'erp_employe[fax]' => 'Testing',
            'erp_employe[email]' => 'Testing',
            'erp_employe[website]' => 'Testing',
            'erp_employe[image]' => 'Testing',
            'erp_employe[login]' => 'Testing',
            'erp_employe[motdepasse]' => 'Testing',
            'erp_employe[creepar]' => 'Testing',
            'erp_employe[datecreation]' => 'Testing',
            'erp_employe[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEmploye();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTel('My Title');
        $fixture->setTel2('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setWebsite('My Title');
        $fixture->setImage('My Title');
        $fixture->setLogin('My Title');
        $fixture->setMotdepasse('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpEmploye');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEmploye();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setLogin('Value');
        $fixture->setMotdepasse('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_employe[code]' => 'Something New',
            'erp_employe[nom]' => 'Something New',
            'erp_employe[prenom]' => 'Something New',
            'erp_employe[adresse]' => 'Something New',
            'erp_employe[tel]' => 'Something New',
            'erp_employe[tel2]' => 'Something New',
            'erp_employe[fax]' => 'Something New',
            'erp_employe[email]' => 'Something New',
            'erp_employe[website]' => 'Something New',
            'erp_employe[image]' => 'Something New',
            'erp_employe[login]' => 'Something New',
            'erp_employe[motdepasse]' => 'Something New',
            'erp_employe[creepar]' => 'Something New',
            'erp_employe[datecreation]' => 'Something New',
            'erp_employe[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/employe/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getTel2());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getWebsite());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getLogin());
        self::assertSame('Something New', $fixture[0]->getMotdepasse());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEmploye();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setLogin('Value');
        $fixture->setMotdepasse('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/employe/');
        self::assertSame(0, $this->repository->count([]));
    }
}
