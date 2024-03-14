<?php

namespace App\Test\Controller;

use App\Entity\ErpContact;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpContactControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/contact/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpContact::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpContact index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_contact[code]' => 'Testing',
            'erp_contact[nomsociete]' => 'Testing',
            'erp_contact[categorie]' => 'Testing',
            'erp_contact[adresseadminstratif]' => 'Testing',
            'erp_contact[nom]' => 'Testing',
            'erp_contact[prenom]' => 'Testing',
            'erp_contact[adresse]' => 'Testing',
            'erp_contact[tel]' => 'Testing',
            'erp_contact[tel2]' => 'Testing',
            'erp_contact[fax]' => 'Testing',
            'erp_contact[email]' => 'Testing',
            'erp_contact[website]' => 'Testing',
            'erp_contact[image]' => 'Testing',
            'erp_contact[creepar]' => 'Testing',
            'erp_contact[datecreation]' => 'Testing',
            'erp_contact[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpContact();
        $fixture->setCode('My Title');
        $fixture->setNomsociete('My Title');
        $fixture->setCategorie('My Title');
        $fixture->setAdresseadminstratif('My Title');
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
        self::assertPageTitleContains('ErpContact');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpContact();
        $fixture->setCode('Value');
        $fixture->setNomsociete('Value');
        $fixture->setCategorie('Value');
        $fixture->setAdresseadminstratif('Value');
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
            'erp_contact[code]' => 'Something New',
            'erp_contact[nomsociete]' => 'Something New',
            'erp_contact[categorie]' => 'Something New',
            'erp_contact[adresseadminstratif]' => 'Something New',
            'erp_contact[nom]' => 'Something New',
            'erp_contact[prenom]' => 'Something New',
            'erp_contact[adresse]' => 'Something New',
            'erp_contact[tel]' => 'Something New',
            'erp_contact[tel2]' => 'Something New',
            'erp_contact[fax]' => 'Something New',
            'erp_contact[email]' => 'Something New',
            'erp_contact[website]' => 'Something New',
            'erp_contact[image]' => 'Something New',
            'erp_contact[creepar]' => 'Something New',
            'erp_contact[datecreation]' => 'Something New',
            'erp_contact[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/contact/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getNomsociete());
        self::assertSame('Something New', $fixture[0]->getCategorie());
        self::assertSame('Something New', $fixture[0]->getAdresseadminstratif());
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
        $fixture = new ErpContact();
        $fixture->setCode('Value');
        $fixture->setNomsociete('Value');
        $fixture->setCategorie('Value');
        $fixture->setAdresseadminstratif('Value');
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

        self::assertResponseRedirects('/erp/contact/');
        self::assertSame(0, $this->repository->count([]));
    }
}
