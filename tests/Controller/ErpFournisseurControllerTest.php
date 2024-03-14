<?php

namespace App\Test\Controller;

use App\Entity\ErpFournisseur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpFournisseurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/fournisseur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpFournisseur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_fournisseur[code]' => 'Testing',
            'erp_fournisseur[codefournisseur]' => 'Testing',
            'erp_fournisseur[raisonsocial]' => 'Testing',
            'erp_fournisseur[ville]' => 'Testing',
            'erp_fournisseur[pays]' => 'Testing',
            'erp_fournisseur[nom]' => 'Testing',
            'erp_fournisseur[prenom]' => 'Testing',
            'erp_fournisseur[adresse]' => 'Testing',
            'erp_fournisseur[tel]' => 'Testing',
            'erp_fournisseur[tel2]' => 'Testing',
            'erp_fournisseur[fax]' => 'Testing',
            'erp_fournisseur[email]' => 'Testing',
            'erp_fournisseur[website]' => 'Testing',
            'erp_fournisseur[image]' => 'Testing',
            'erp_fournisseur[creepar]' => 'Testing',
            'erp_fournisseur[datecreation]' => 'Testing',
            'erp_fournisseur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFournisseur();
        $fixture->setCode('My Title');
        $fixture->setCodefournisseur('My Title');
        $fixture->setRaisonsocial('My Title');
        $fixture->setVille('My Title');
        $fixture->setPays('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTel('My Title');
        $fixture->setTel2('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setWebsite('My Title');
        $fixture->setImage('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFournisseur();
        $fixture->setCode('Value');
        $fixture->setCodefournisseur('Value');
        $fixture->setRaisonsocial('Value');
        $fixture->setVille('Value');
        $fixture->setPays('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_fournisseur[code]' => 'Something New',
            'erp_fournisseur[codefournisseur]' => 'Something New',
            'erp_fournisseur[raisonsocial]' => 'Something New',
            'erp_fournisseur[ville]' => 'Something New',
            'erp_fournisseur[pays]' => 'Something New',
            'erp_fournisseur[nom]' => 'Something New',
            'erp_fournisseur[prenom]' => 'Something New',
            'erp_fournisseur[adresse]' => 'Something New',
            'erp_fournisseur[tel]' => 'Something New',
            'erp_fournisseur[tel2]' => 'Something New',
            'erp_fournisseur[fax]' => 'Something New',
            'erp_fournisseur[email]' => 'Something New',
            'erp_fournisseur[website]' => 'Something New',
            'erp_fournisseur[image]' => 'Something New',
            'erp_fournisseur[creepar]' => 'Something New',
            'erp_fournisseur[datecreation]' => 'Something New',
            'erp_fournisseur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/fournisseur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodefournisseur());
        self::assertSame('Something New', $fixture[0]->getRaisonsocial());
        self::assertSame('Something New', $fixture[0]->getVille());
        self::assertSame('Something New', $fixture[0]->getPays());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getTel2());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getWebsite());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpFournisseur();
        $fixture->setCode('Value');
        $fixture->setCodefournisseur('Value');
        $fixture->setRaisonsocial('Value');
        $fixture->setVille('Value');
        $fixture->setPays('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/fournisseur/');
        self::assertSame(0, $this->repository->count([]));
    }
}
