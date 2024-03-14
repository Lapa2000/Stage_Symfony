<?php

namespace App\Test\Controller;

use App\Entity\FactureFournisseurNewData;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FactureFournisseurNewDataControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/facture/fournisseur/new/data/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(FactureFournisseurNewData::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FactureFournisseurNewDatum index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'facture_fournisseur_new_datum[code]' => 'Testing',
            'facture_fournisseur_new_datum[codedevis]' => 'Testing',
            'facture_fournisseur_new_datum[masociete]' => 'Testing',
            'facture_fournisseur_new_datum[monadresse]' => 'Testing',
            'facture_fournisseur_new_datum[montel]' => 'Testing',
            'facture_fournisseur_new_datum[monfax]' => 'Testing',
            'facture_fournisseur_new_datum[monregistre]' => 'Testing',
            'facture_fournisseur_new_datum[monmatricule]' => 'Testing',
            'facture_fournisseur_new_datum[clientcode]' => 'Testing',
            'facture_fournisseur_new_datum[clientraison]' => 'Testing',
            'facture_fournisseur_new_datum[clientnom]' => 'Testing',
            'facture_fournisseur_new_datum[clientprenom]' => 'Testing',
            'facture_fournisseur_new_datum[clienttel]' => 'Testing',
            'facture_fournisseur_new_datum[clientfax]' => 'Testing',
            'facture_fournisseur_new_datum[clientadresse]' => 'Testing',
            'facture_fournisseur_new_datum[clientmatricule]' => 'Testing',
            'facture_fournisseur_new_datum[totalht]' => 'Testing',
            'facture_fournisseur_new_datum[totaltva]' => 'Testing',
            'facture_fournisseur_new_datum[remises]' => 'Testing',
            'facture_fournisseur_new_datum[timbres]' => 'Testing',
            'facture_fournisseur_new_datum[totalttc]' => 'Testing',
            'facture_fournisseur_new_datum[chauffeurnom]' => 'Testing',
            'facture_fournisseur_new_datum[chauffeurvehicule]' => 'Testing',
            'facture_fournisseur_new_datum[creationcode]' => 'Testing',
            'facture_fournisseur_new_datum[creationnom]' => 'Testing',
            'facture_fournisseur_new_datum[creationprenom]' => 'Testing',
            'facture_fournisseur_new_datum[creationdate]' => 'Testing',
            'facture_fournisseur_new_datum[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new FactureFournisseurNewData();
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
        self::assertPageTitleContains('FactureFournisseurNewDatum');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new FactureFournisseurNewData();
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
            'facture_fournisseur_new_datum[code]' => 'Something New',
            'facture_fournisseur_new_datum[codedevis]' => 'Something New',
            'facture_fournisseur_new_datum[masociete]' => 'Something New',
            'facture_fournisseur_new_datum[monadresse]' => 'Something New',
            'facture_fournisseur_new_datum[montel]' => 'Something New',
            'facture_fournisseur_new_datum[monfax]' => 'Something New',
            'facture_fournisseur_new_datum[monregistre]' => 'Something New',
            'facture_fournisseur_new_datum[monmatricule]' => 'Something New',
            'facture_fournisseur_new_datum[clientcode]' => 'Something New',
            'facture_fournisseur_new_datum[clientraison]' => 'Something New',
            'facture_fournisseur_new_datum[clientnom]' => 'Something New',
            'facture_fournisseur_new_datum[clientprenom]' => 'Something New',
            'facture_fournisseur_new_datum[clienttel]' => 'Something New',
            'facture_fournisseur_new_datum[clientfax]' => 'Something New',
            'facture_fournisseur_new_datum[clientadresse]' => 'Something New',
            'facture_fournisseur_new_datum[clientmatricule]' => 'Something New',
            'facture_fournisseur_new_datum[totalht]' => 'Something New',
            'facture_fournisseur_new_datum[totaltva]' => 'Something New',
            'facture_fournisseur_new_datum[remises]' => 'Something New',
            'facture_fournisseur_new_datum[timbres]' => 'Something New',
            'facture_fournisseur_new_datum[totalttc]' => 'Something New',
            'facture_fournisseur_new_datum[chauffeurnom]' => 'Something New',
            'facture_fournisseur_new_datum[chauffeurvehicule]' => 'Something New',
            'facture_fournisseur_new_datum[creationcode]' => 'Something New',
            'facture_fournisseur_new_datum[creationnom]' => 'Something New',
            'facture_fournisseur_new_datum[creationprenom]' => 'Something New',
            'facture_fournisseur_new_datum[creationdate]' => 'Something New',
            'facture_fournisseur_new_datum[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/facture/fournisseur/new/data/');

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
        $fixture = new FactureFournisseurNewData();
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

        self::assertResponseRedirects('/facture/fournisseur/new/data/');
        self::assertSame(0, $this->repository->count([]));
    }
}
