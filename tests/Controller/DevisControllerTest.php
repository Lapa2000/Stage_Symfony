<?php

namespace App\Test\Controller;

use App\Entity\Devis;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DevisControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/devis/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Devis::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Devi index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'devi[code]' => 'Testing',
            'devi[codedevis]' => 'Testing',
            'devi[masociete]' => 'Testing',
            'devi[monadresse]' => 'Testing',
            'devi[montel]' => 'Testing',
            'devi[monfax]' => 'Testing',
            'devi[monregistre]' => 'Testing',
            'devi[monmatricule]' => 'Testing',
            'devi[clientcode]' => 'Testing',
            'devi[clientraison]' => 'Testing',
            'devi[clientnom]' => 'Testing',
            'devi[clientprenom]' => 'Testing',
            'devi[clientfax]' => 'Testing',
            'devi[clientadresse]' => 'Testing',
            'devi[clientmatricule]' => 'Testing',
            'devi[totalht]' => 'Testing',
            'devi[tva]' => 'Testing',
            'devi[totaltva]' => 'Testing',
            'devi[remises]' => 'Testing',
            'devi[timbres]' => 'Testing',
            'devi[totalttc]' => 'Testing',
            'devi[chauffeurnom]' => 'Testing',
            'devi[chauffeurvehicule]' => 'Testing',
            'devi[creationcode]' => 'Testing',
            'devi[creationnom]' => 'Testing',
            'devi[creationprenom]' => 'Testing',
            'devi[creationdate]' => 'Testing',
            'devi[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Devis();
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
        self::assertPageTitleContains('Devi');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Devis();
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
            'devi[code]' => 'Something New',
            'devi[codedevis]' => 'Something New',
            'devi[masociete]' => 'Something New',
            'devi[monadresse]' => 'Something New',
            'devi[montel]' => 'Something New',
            'devi[monfax]' => 'Something New',
            'devi[monregistre]' => 'Something New',
            'devi[monmatricule]' => 'Something New',
            'devi[clientcode]' => 'Something New',
            'devi[clientraison]' => 'Something New',
            'devi[clientnom]' => 'Something New',
            'devi[clientprenom]' => 'Something New',
            'devi[clientfax]' => 'Something New',
            'devi[clientadresse]' => 'Something New',
            'devi[clientmatricule]' => 'Something New',
            'devi[totalht]' => 'Something New',
            'devi[tva]' => 'Something New',
            'devi[totaltva]' => 'Something New',
            'devi[remises]' => 'Something New',
            'devi[timbres]' => 'Something New',
            'devi[totalttc]' => 'Something New',
            'devi[chauffeurnom]' => 'Something New',
            'devi[chauffeurvehicule]' => 'Something New',
            'devi[creationcode]' => 'Something New',
            'devi[creationnom]' => 'Something New',
            'devi[creationprenom]' => 'Something New',
            'devi[creationdate]' => 'Something New',
            'devi[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/devis/');

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
        $fixture = new Devis();
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

        self::assertResponseRedirects('/devis/');
        self::assertSame(0, $this->repository->count([]));
    }
}
