<?php

namespace App\Test\Controller;

use App\Entity\DevisFournisseurNew;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DevisFournisseurNewControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/devis/fournisseur/new/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(DevisFournisseurNew::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DevisFournisseurNew index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'devis_fournisseur_new[code]' => 'Testing',
            'devis_fournisseur_new[codedevis]' => 'Testing',
            'devis_fournisseur_new[masociete]' => 'Testing',
            'devis_fournisseur_new[monadresse]' => 'Testing',
            'devis_fournisseur_new[montel]' => 'Testing',
            'devis_fournisseur_new[monfax]' => 'Testing',
            'devis_fournisseur_new[monregistre]' => 'Testing',
            'devis_fournisseur_new[monmatricule]' => 'Testing',
            'devis_fournisseur_new[clientcode]' => 'Testing',
            'devis_fournisseur_new[clientraison]' => 'Testing',
            'devis_fournisseur_new[clientnom]' => 'Testing',
            'devis_fournisseur_new[clientprenom]' => 'Testing',
            'devis_fournisseur_new[clienttel]' => 'Testing',
            'devis_fournisseur_new[clientfax]' => 'Testing',
            'devis_fournisseur_new[clientadresse]' => 'Testing',
            'devis_fournisseur_new[clientmatricule]' => 'Testing',
            'devis_fournisseur_new[totalht]' => 'Testing',
            'devis_fournisseur_new[totaltva]' => 'Testing',
            'devis_fournisseur_new[remises]' => 'Testing',
            'devis_fournisseur_new[timbres]' => 'Testing',
            'devis_fournisseur_new[totalttc]' => 'Testing',
            'devis_fournisseur_new[chauffeurnom]' => 'Testing',
            'devis_fournisseur_new[chauffeurvehicule]' => 'Testing',
            'devis_fournisseur_new[creationcode]' => 'Testing',
            'devis_fournisseur_new[creationnom]' => 'Testing',
            'devis_fournisseur_new[creationprenom]' => 'Testing',
            'devis_fournisseur_new[creationdate]' => 'Testing',
            'devis_fournisseur_new[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new DevisFournisseurNew();
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
        $fixture->setClienttel('My Title');
        $fixture->setClientfax('My Title');
        $fixture->setClientadresse('My Title');
        $fixture->setClientmatricule('My Title');
        $fixture->setTotalht('My Title');
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
        self::assertPageTitleContains('DevisFournisseurNew');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new DevisFournisseurNew();
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
        $fixture->setClienttel('Value');
        $fixture->setClientfax('Value');
        $fixture->setClientadresse('Value');
        $fixture->setClientmatricule('Value');
        $fixture->setTotalht('Value');
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
            'devis_fournisseur_new[code]' => 'Something New',
            'devis_fournisseur_new[codedevis]' => 'Something New',
            'devis_fournisseur_new[masociete]' => 'Something New',
            'devis_fournisseur_new[monadresse]' => 'Something New',
            'devis_fournisseur_new[montel]' => 'Something New',
            'devis_fournisseur_new[monfax]' => 'Something New',
            'devis_fournisseur_new[monregistre]' => 'Something New',
            'devis_fournisseur_new[monmatricule]' => 'Something New',
            'devis_fournisseur_new[clientcode]' => 'Something New',
            'devis_fournisseur_new[clientraison]' => 'Something New',
            'devis_fournisseur_new[clientnom]' => 'Something New',
            'devis_fournisseur_new[clientprenom]' => 'Something New',
            'devis_fournisseur_new[clienttel]' => 'Something New',
            'devis_fournisseur_new[clientfax]' => 'Something New',
            'devis_fournisseur_new[clientadresse]' => 'Something New',
            'devis_fournisseur_new[clientmatricule]' => 'Something New',
            'devis_fournisseur_new[totalht]' => 'Something New',
            'devis_fournisseur_new[totaltva]' => 'Something New',
            'devis_fournisseur_new[remises]' => 'Something New',
            'devis_fournisseur_new[timbres]' => 'Something New',
            'devis_fournisseur_new[totalttc]' => 'Something New',
            'devis_fournisseur_new[chauffeurnom]' => 'Something New',
            'devis_fournisseur_new[chauffeurvehicule]' => 'Something New',
            'devis_fournisseur_new[creationcode]' => 'Something New',
            'devis_fournisseur_new[creationnom]' => 'Something New',
            'devis_fournisseur_new[creationprenom]' => 'Something New',
            'devis_fournisseur_new[creationdate]' => 'Something New',
            'devis_fournisseur_new[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/devis/fournisseur/new/');

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
        self::assertSame('Something New', $fixture[0]->getClienttel());
        self::assertSame('Something New', $fixture[0]->getClientfax());
        self::assertSame('Something New', $fixture[0]->getClientadresse());
        self::assertSame('Something New', $fixture[0]->getClientmatricule());
        self::assertSame('Something New', $fixture[0]->getTotalht());
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
        $fixture = new DevisFournisseurNew();
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
        $fixture->setClienttel('Value');
        $fixture->setClientfax('Value');
        $fixture->setClientadresse('Value');
        $fixture->setClientmatricule('Value');
        $fixture->setTotalht('Value');
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

        self::assertResponseRedirects('/devis/fournisseur/new/');
        self::assertSame(0, $this->repository->count([]));
    }
}
