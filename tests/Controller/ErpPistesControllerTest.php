<?php

namespace App\Test\Controller;

use App\Entity\ErpPistes;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpPistesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/pistes/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpPistes::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpPiste index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_piste[code]' => 'Testing',
            'erp_piste[nom]' => 'Testing',
            'erp_piste[prenom]' => 'Testing',
            'erp_piste[societe]' => 'Testing',
            'erp_piste[secteur]' => 'Testing',
            'erp_piste[mobile]' => 'Testing',
            'erp_piste[email]' => 'Testing',
            'erp_piste[website]' => 'Testing',
            'erp_piste[adresse]' => 'Testing',
            'erp_piste[codepostal]' => 'Testing',
            'erp_piste[pays]' => 'Testing',
            'erp_piste[image]' => 'Testing',
            'erp_piste[creepar]' => 'Testing',
            'erp_piste[datecreation]' => 'Testing',
            'erp_piste[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpPistes();
        $fixture->setCode('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setSociete('My Title');
        $fixture->setSecteur('My Title');
        $fixture->setMobile('My Title');
        $fixture->setEmail('My Title');
        $fixture->setWebsite('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCodepostal('My Title');
        $fixture->setPays('My Title');
        $fixture->setImage('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpPiste');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpPistes();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setSociete('Value');
        $fixture->setSecteur('Value');
        $fixture->setMobile('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setAdresse('Value');
        $fixture->setCodepostal('Value');
        $fixture->setPays('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_piste[code]' => 'Something New',
            'erp_piste[nom]' => 'Something New',
            'erp_piste[prenom]' => 'Something New',
            'erp_piste[societe]' => 'Something New',
            'erp_piste[secteur]' => 'Something New',
            'erp_piste[mobile]' => 'Something New',
            'erp_piste[email]' => 'Something New',
            'erp_piste[website]' => 'Something New',
            'erp_piste[adresse]' => 'Something New',
            'erp_piste[codepostal]' => 'Something New',
            'erp_piste[pays]' => 'Something New',
            'erp_piste[image]' => 'Something New',
            'erp_piste[creepar]' => 'Something New',
            'erp_piste[datecreation]' => 'Something New',
            'erp_piste[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/pistes/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getSociete());
        self::assertSame('Something New', $fixture[0]->getSecteur());
        self::assertSame('Something New', $fixture[0]->getMobile());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getWebsite());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getCodepostal());
        self::assertSame('Something New', $fixture[0]->getPays());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpPistes();
        $fixture->setCode('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setSociete('Value');
        $fixture->setSecteur('Value');
        $fixture->setMobile('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setAdresse('Value');
        $fixture->setCodepostal('Value');
        $fixture->setPays('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/pistes/');
        self::assertSame(0, $this->repository->count([]));
    }
}
