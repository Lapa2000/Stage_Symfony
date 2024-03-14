<?php

namespace App\Test\Controller;

use App\Entity\ErpEcritureComptable;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpEcritureComptableControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/ecriture/comptable/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpEcritureComptable::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpEcritureComptable index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_ecriture_comptable[code]' => 'Testing',
            'erp_ecriture_comptable[compte]' => 'Testing',
            'erp_ecriture_comptable[libelle]' => 'Testing',
            'erp_ecriture_comptable[montant]' => 'Testing',
            'erp_ecriture_comptable[idlibelle]' => 'Testing',
            'erp_ecriture_comptable[debit]' => 'Testing',
            'erp_ecriture_comptable[credit]' => 'Testing',
            'erp_ecriture_comptable[creepar]' => 'Testing',
            'erp_ecriture_comptable[datecreation]' => 'Testing',
            'erp_ecriture_comptable[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEcritureComptable();
        $fixture->setCode('My Title');
        $fixture->setCompte('My Title');
        $fixture->setLibelle('My Title');
        $fixture->setMontant('My Title');
        $fixture->setIdlibelle('My Title');
        $fixture->setDebit('My Title');
        $fixture->setCredit('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpEcritureComptable');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEcritureComptable();
        $fixture->setCode('Value');
        $fixture->setCompte('Value');
        $fixture->setLibelle('Value');
        $fixture->setMontant('Value');
        $fixture->setIdlibelle('Value');
        $fixture->setDebit('Value');
        $fixture->setCredit('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_ecriture_comptable[code]' => 'Something New',
            'erp_ecriture_comptable[compte]' => 'Something New',
            'erp_ecriture_comptable[libelle]' => 'Something New',
            'erp_ecriture_comptable[montant]' => 'Something New',
            'erp_ecriture_comptable[idlibelle]' => 'Something New',
            'erp_ecriture_comptable[debit]' => 'Something New',
            'erp_ecriture_comptable[credit]' => 'Something New',
            'erp_ecriture_comptable[creepar]' => 'Something New',
            'erp_ecriture_comptable[datecreation]' => 'Something New',
            'erp_ecriture_comptable[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/ecriture/comptable/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCompte());
        self::assertSame('Something New', $fixture[0]->getLibelle());
        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getIdlibelle());
        self::assertSame('Something New', $fixture[0]->getDebit());
        self::assertSame('Something New', $fixture[0]->getCredit());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpEcritureComptable();
        $fixture->setCode('Value');
        $fixture->setCompte('Value');
        $fixture->setLibelle('Value');
        $fixture->setMontant('Value');
        $fixture->setIdlibelle('Value');
        $fixture->setDebit('Value');
        $fixture->setCredit('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/ecriture/comptable/');
        self::assertSame(0, $this->repository->count([]));
    }
}
