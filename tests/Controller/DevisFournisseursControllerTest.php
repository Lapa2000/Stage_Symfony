<?php

namespace App\Test\Controller;

use App\Entity\DevisFournisseurs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DevisFournisseursControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/devis/fournisseurs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(DevisFournisseurs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DevisFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'devis_fournisseur[code]' => 'Testing',
            'devis_fournisseur[codedevis]' => 'Testing',
            'devis_fournisseur[monlogo]' => 'Testing',
            'devis_fournisseur[masociete]' => 'Testing',
            'devis_fournisseur[monadresse]' => 'Testing',
            'devis_fournisseur[montel]' => 'Testing',
            'devis_fournisseur[nomclient]' => 'Testing',
            'devis_fournisseur[adresse]' => 'Testing',
            'devis_fournisseur[telclient]' => 'Testing',
            'devis_fournisseur[datedevis]' => 'Testing',
            'devis_fournisseur[totalht]' => 'Testing',
            'devis_fournisseur[totaltva]' => 'Testing',
            'devis_fournisseur[totalttc]' => 'Testing',
            'devis_fournisseur[creepar]' => 'Testing',
            'devis_fournisseur[datecreation]' => 'Testing',
            'devis_fournisseur[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new DevisFournisseurs();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setMonlogo('My Title');
        $fixture->setMasociete('My Title');
        $fixture->setMonadresse('My Title');
        $fixture->setMontel('My Title');
        $fixture->setNomclient('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTelclient('My Title');
        $fixture->setDatedevis('My Title');
        $fixture->setTotalht('My Title');
        $fixture->setTotaltva('My Title');
        $fixture->setTotalttc('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DevisFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new DevisFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setDatedevis('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'devis_fournisseur[code]' => 'Something New',
            'devis_fournisseur[codedevis]' => 'Something New',
            'devis_fournisseur[monlogo]' => 'Something New',
            'devis_fournisseur[masociete]' => 'Something New',
            'devis_fournisseur[monadresse]' => 'Something New',
            'devis_fournisseur[montel]' => 'Something New',
            'devis_fournisseur[nomclient]' => 'Something New',
            'devis_fournisseur[adresse]' => 'Something New',
            'devis_fournisseur[telclient]' => 'Something New',
            'devis_fournisseur[datedevis]' => 'Something New',
            'devis_fournisseur[totalht]' => 'Something New',
            'devis_fournisseur[totaltva]' => 'Something New',
            'devis_fournisseur[totalttc]' => 'Something New',
            'devis_fournisseur[creepar]' => 'Something New',
            'devis_fournisseur[datecreation]' => 'Something New',
            'devis_fournisseur[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/devis/fournisseurs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getMonlogo());
        self::assertSame('Something New', $fixture[0]->getMasociete());
        self::assertSame('Something New', $fixture[0]->getMonadresse());
        self::assertSame('Something New', $fixture[0]->getMontel());
        self::assertSame('Something New', $fixture[0]->getNomclient());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTelclient());
        self::assertSame('Something New', $fixture[0]->getDatedevis());
        self::assertSame('Something New', $fixture[0]->getTotalht());
        self::assertSame('Something New', $fixture[0]->getTotaltva());
        self::assertSame('Something New', $fixture[0]->getTotalttc());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new DevisFournisseurs();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMonlogo('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setNomclient('Value');
        $fixture->setAdresse('Value');
        $fixture->setTelclient('Value');
        $fixture->setDatedevis('Value');
        $fixture->setTotalht('Value');
        $fixture->setTotaltva('Value');
        $fixture->setTotalttc('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/devis/fournisseurs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
