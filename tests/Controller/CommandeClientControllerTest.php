<?php

namespace App\Test\Controller;

use App\Entity\CommandeClient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandeClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/commande/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(CommandeClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('CommandeClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'commande_client[code]' => 'Testing',
            'commande_client[codedevis]' => 'Testing',
            'commande_client[masociete]' => 'Testing',
            'commande_client[monadresse]' => 'Testing',
            'commande_client[montel]' => 'Testing',
            'commande_client[monfax]' => 'Testing',
            'commande_client[monregistre]' => 'Testing',
            'commande_client[monmatricule]' => 'Testing',
            'commande_client[clientcode]' => 'Testing',
            'commande_client[clientraison]' => 'Testing',
            'commande_client[clientnom]' => 'Testing',
            'commande_client[clientprenom]' => 'Testing',
            'commande_client[clientel]' => 'Testing',
            'commande_client[clientfax]' => 'Testing',
            'commande_client[clientadresse]' => 'Testing',
            'commande_client[clientmatricule]' => 'Testing',
            'commande_client[totalht]' => 'Testing',
            'commande_client[tva]' => 'Testing',
            'commande_client[totaltva]' => 'Testing',
            'commande_client[remises]' => 'Testing',
            'commande_client[timbres]' => 'Testing',
            'commande_client[totalttc]' => 'Testing',
            'commande_client[chauffeurnom]' => 'Testing',
            'commande_client[chauffeurvehicule]' => 'Testing',
            'commande_client[creationcode]' => 'Testing',
            'commande_client[creationnom]' => 'Testing',
            'commande_client[creationprenom]' => 'Testing',
            'commande_client[creationdate]' => 'Testing',
            'commande_client[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new CommandeClient();
        $fixture->setCode('My Title');
        $fixture->setCodedevis('My Title');
        $fixture->setMasociete('My Title');
        $fixture->setMonadresse('My Title');
        $fixture->setMontel('My Title');
        $fixture->setMonfax('My Title');
        $fixture->setMonregistre('My Title');
        $fixture->setMonmatricule('My Title');
        $fixture->setClientcode('My Title');
        $fixture->setClientraison('My Title');
        $fixture->setClientnom('My Title');
        $fixture->setClientprenom('My Title');
        $fixture->setClientel('My Title');
        $fixture->setClientfax('My Title');
        $fixture->setClientadresse('My Title');
        $fixture->setClientmatricule('My Title');
        $fixture->setTotalht('My Title');
        $fixture->setTva('My Title');
        $fixture->setTotaltva('My Title');
        $fixture->setRemises('My Title');
        $fixture->setTimbres('My Title');
        $fixture->setTotalttc('My Title');
        $fixture->setChauffeurnom('My Title');
        $fixture->setChauffeurvehicule('My Title');
        $fixture->setCreationcode('My Title');
        $fixture->setCreationnom('My Title');
        $fixture->setCreationprenom('My Title');
        $fixture->setCreationdate('My Title');
        $fixture->setCreationheure('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('CommandeClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new CommandeClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setMonfax('Value');
        $fixture->setMonregistre('Value');
        $fixture->setMonmatricule('Value');
        $fixture->setClientcode('Value');
        $fixture->setClientraison('Value');
        $fixture->setClientnom('Value');
        $fixture->setClientprenom('Value');
        $fixture->setClientel('Value');
        $fixture->setClientfax('Value');
        $fixture->setClientadresse('Value');
        $fixture->setClientmatricule('Value');
        $fixture->setTotalht('Value');
        $fixture->setTva('Value');
        $fixture->setTotaltva('Value');
        $fixture->setRemises('Value');
        $fixture->setTimbres('Value');
        $fixture->setTotalttc('Value');
        $fixture->setChauffeurnom('Value');
        $fixture->setChauffeurvehicule('Value');
        $fixture->setCreationcode('Value');
        $fixture->setCreationnom('Value');
        $fixture->setCreationprenom('Value');
        $fixture->setCreationdate('Value');
        $fixture->setCreationheure('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'commande_client[code]' => 'Something New',
            'commande_client[codedevis]' => 'Something New',
            'commande_client[masociete]' => 'Something New',
            'commande_client[monadresse]' => 'Something New',
            'commande_client[montel]' => 'Something New',
            'commande_client[monfax]' => 'Something New',
            'commande_client[monregistre]' => 'Something New',
            'commande_client[monmatricule]' => 'Something New',
            'commande_client[clientcode]' => 'Something New',
            'commande_client[clientraison]' => 'Something New',
            'commande_client[clientnom]' => 'Something New',
            'commande_client[clientprenom]' => 'Something New',
            'commande_client[clientel]' => 'Something New',
            'commande_client[clientfax]' => 'Something New',
            'commande_client[clientadresse]' => 'Something New',
            'commande_client[clientmatricule]' => 'Something New',
            'commande_client[totalht]' => 'Something New',
            'commande_client[tva]' => 'Something New',
            'commande_client[totaltva]' => 'Something New',
            'commande_client[remises]' => 'Something New',
            'commande_client[timbres]' => 'Something New',
            'commande_client[totalttc]' => 'Something New',
            'commande_client[chauffeurnom]' => 'Something New',
            'commande_client[chauffeurvehicule]' => 'Something New',
            'commande_client[creationcode]' => 'Something New',
            'commande_client[creationnom]' => 'Something New',
            'commande_client[creationprenom]' => 'Something New',
            'commande_client[creationdate]' => 'Something New',
            'commande_client[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/commande/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodedevis());
        self::assertSame('Something New', $fixture[0]->getMasociete());
        self::assertSame('Something New', $fixture[0]->getMonadresse());
        self::assertSame('Something New', $fixture[0]->getMontel());
        self::assertSame('Something New', $fixture[0]->getMonfax());
        self::assertSame('Something New', $fixture[0]->getMonregistre());
        self::assertSame('Something New', $fixture[0]->getMonmatricule());
        self::assertSame('Something New', $fixture[0]->getClientcode());
        self::assertSame('Something New', $fixture[0]->getClientraison());
        self::assertSame('Something New', $fixture[0]->getClientnom());
        self::assertSame('Something New', $fixture[0]->getClientprenom());
        self::assertSame('Something New', $fixture[0]->getClientel());
        self::assertSame('Something New', $fixture[0]->getClientfax());
        self::assertSame('Something New', $fixture[0]->getClientadresse());
        self::assertSame('Something New', $fixture[0]->getClientmatricule());
        self::assertSame('Something New', $fixture[0]->getTotalht());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getTotaltva());
        self::assertSame('Something New', $fixture[0]->getRemises());
        self::assertSame('Something New', $fixture[0]->getTimbres());
        self::assertSame('Something New', $fixture[0]->getTotalttc());
        self::assertSame('Something New', $fixture[0]->getChauffeurnom());
        self::assertSame('Something New', $fixture[0]->getChauffeurvehicule());
        self::assertSame('Something New', $fixture[0]->getCreationcode());
        self::assertSame('Something New', $fixture[0]->getCreationnom());
        self::assertSame('Something New', $fixture[0]->getCreationprenom());
        self::assertSame('Something New', $fixture[0]->getCreationdate());
        self::assertSame('Something New', $fixture[0]->getCreationheure());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new CommandeClient();
        $fixture->setCode('Value');
        $fixture->setCodedevis('Value');
        $fixture->setMasociete('Value');
        $fixture->setMonadresse('Value');
        $fixture->setMontel('Value');
        $fixture->setMonfax('Value');
        $fixture->setMonregistre('Value');
        $fixture->setMonmatricule('Value');
        $fixture->setClientcode('Value');
        $fixture->setClientraison('Value');
        $fixture->setClientnom('Value');
        $fixture->setClientprenom('Value');
        $fixture->setClientel('Value');
        $fixture->setClientfax('Value');
        $fixture->setClientadresse('Value');
        $fixture->setClientmatricule('Value');
        $fixture->setTotalht('Value');
        $fixture->setTva('Value');
        $fixture->setTotaltva('Value');
        $fixture->setRemises('Value');
        $fixture->setTimbres('Value');
        $fixture->setTotalttc('Value');
        $fixture->setChauffeurnom('Value');
        $fixture->setChauffeurvehicule('Value');
        $fixture->setCreationcode('Value');
        $fixture->setCreationnom('Value');
        $fixture->setCreationprenom('Value');
        $fixture->setCreationdate('Value');
        $fixture->setCreationheure('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/commande/client/');
        self::assertSame(0, $this->repository->count([]));
    }
}
