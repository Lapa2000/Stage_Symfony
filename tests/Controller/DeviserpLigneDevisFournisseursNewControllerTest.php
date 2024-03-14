<?php

namespace App\Test\Controller;

use App\Entity\DeviserpLigneDevisFournisseursNew;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeviserpLigneDevisFournisseursNewControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/deviserp/ligne/devis/fournisseurs/new/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(DeviserpLigneDevisFournisseursNew::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DeviserpLigneDevisFournisseursNew index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'deviserp_ligne_devis_fournisseurs_new[code]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[codedevis]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[masociete]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[monadresse]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[montel]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[monfax]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[monregistre]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[monmatricule]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientcode]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientraison]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientnom]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientprenom]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clienttel]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientfax]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientadresse]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[clientmatricule]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[totalht]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[totaltva]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[remises]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[timbres]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[totalttc]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[chauffeurnom]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[chauffeurvehicule]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[creationcode]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[creationnom]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[creationprenom]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[creationdate]' => 'Testing',
            'deviserp_ligne_devis_fournisseurs_new[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new DeviserpLigneDevisFournisseursNew();
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
        self::assertPageTitleContains('DeviserpLigneDevisFournisseursNew');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new DeviserpLigneDevisFournisseursNew();
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
            'deviserp_ligne_devis_fournisseurs_new[code]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[codedevis]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[masociete]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[monadresse]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[montel]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[monfax]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[monregistre]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[monmatricule]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientcode]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientraison]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientnom]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientprenom]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clienttel]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientfax]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientadresse]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[clientmatricule]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[totalht]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[totaltva]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[remises]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[timbres]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[totalttc]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[chauffeurnom]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[chauffeurvehicule]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[creationcode]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[creationnom]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[creationprenom]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[creationdate]' => 'Something New',
            'deviserp_ligne_devis_fournisseurs_new[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/deviserp/ligne/devis/fournisseurs/new/');

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
        $fixture = new DeviserpLigneDevisFournisseursNew();
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

        self::assertResponseRedirects('/deviserp/ligne/devis/fournisseurs/new/');
        self::assertSame(0, $this->repository->count([]));
    }
}
