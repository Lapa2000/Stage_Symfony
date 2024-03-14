<?php

namespace App\Test\Controller;

use App\Entity\CommandeFournisseurNew;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandeFournisseurNewControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/commande/fournisseur/new/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(CommandeFournisseurNew::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('CommandeFournisseurNew index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'commande_fournisseur_new[code]' => 'Testing',
            'commande_fournisseur_new[codedevis]' => 'Testing',
            'commande_fournisseur_new[monlogo]' => 'Testing',
            'commande_fournisseur_new[masociete]' => 'Testing',
            'commande_fournisseur_new[monadresse]' => 'Testing',
            'commande_fournisseur_new[montel]' => 'Testing',
            'commande_fournisseur_new[nomclient]' => 'Testing',
            'commande_fournisseur_new[adresse]' => 'Testing',
            'commande_fournisseur_new[telclient]' => 'Testing',
            'commande_fournisseur_new[datedevis]' => 'Testing',
            'commande_fournisseur_new[totalht]' => 'Testing',
            'commande_fournisseur_new[totaltva]' => 'Testing',
            'commande_fournisseur_new[totalttc]' => 'Testing',
            'commande_fournisseur_new[creepar]' => 'Testing',
            'commande_fournisseur_new[datecreation]' => 'Testing',
            'commande_fournisseur_new[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new CommandeFournisseurNew();
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
        self::assertPageTitleContains('CommandeFournisseurNew');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new CommandeFournisseurNew();
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
            'commande_fournisseur_new[code]' => 'Something New',
            'commande_fournisseur_new[codedevis]' => 'Something New',
            'commande_fournisseur_new[monlogo]' => 'Something New',
            'commande_fournisseur_new[masociete]' => 'Something New',
            'commande_fournisseur_new[monadresse]' => 'Something New',
            'commande_fournisseur_new[montel]' => 'Something New',
            'commande_fournisseur_new[nomclient]' => 'Something New',
            'commande_fournisseur_new[adresse]' => 'Something New',
            'commande_fournisseur_new[telclient]' => 'Something New',
            'commande_fournisseur_new[datedevis]' => 'Something New',
            'commande_fournisseur_new[totalht]' => 'Something New',
            'commande_fournisseur_new[totaltva]' => 'Something New',
            'commande_fournisseur_new[totalttc]' => 'Something New',
            'commande_fournisseur_new[creepar]' => 'Something New',
            'commande_fournisseur_new[datecreation]' => 'Something New',
            'commande_fournisseur_new[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/commande/fournisseur/new/');

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
        $fixture = new CommandeFournisseurNew();
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

        self::assertResponseRedirects('/commande/fournisseur/new/');
        self::assertSame(0, $this->repository->count([]));
    }
}
