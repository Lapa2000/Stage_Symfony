<?php

namespace App\Test\Controller;

use App\Entity\ErpDevisClientNewFromFactures;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpDevisClientNewFromFacturesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/devis/client/new/from/factures/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpDevisClientNewFromFactures::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpDevisClientNewFromFacture index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_devis_client_new_from_facture[code]' => 'Testing',
            'erp_devis_client_new_from_facture[codedevis]' => 'Testing',
            'erp_devis_client_new_from_facture[masociete]' => 'Testing',
            'erp_devis_client_new_from_facture[monadresse]' => 'Testing',
            'erp_devis_client_new_from_facture[montel]' => 'Testing',
            'erp_devis_client_new_from_facture[monfax]' => 'Testing',
            'erp_devis_client_new_from_facture[monregistre]' => 'Testing',
            'erp_devis_client_new_from_facture[monmatricule]' => 'Testing',
            'erp_devis_client_new_from_facture[clientcode]' => 'Testing',
            'erp_devis_client_new_from_facture[clientraison]' => 'Testing',
            'erp_devis_client_new_from_facture[clientnom]' => 'Testing',
            'erp_devis_client_new_from_facture[clientprenom]' => 'Testing',
            'erp_devis_client_new_from_facture[clienttel]' => 'Testing',
            'erp_devis_client_new_from_facture[clientfax]' => 'Testing',
            'erp_devis_client_new_from_facture[clientadresse]' => 'Testing',
            'erp_devis_client_new_from_facture[clientmatricule]' => 'Testing',
            'erp_devis_client_new_from_facture[totalht]' => 'Testing',
            'erp_devis_client_new_from_facture[tva]' => 'Testing',
            'erp_devis_client_new_from_facture[totaltva]' => 'Testing',
            'erp_devis_client_new_from_facture[remises]' => 'Testing',
            'erp_devis_client_new_from_facture[timbres]' => 'Testing',
            'erp_devis_client_new_from_facture[totalttc]' => 'Testing',
            'erp_devis_client_new_from_facture[chauffeurnom]' => 'Testing',
            'erp_devis_client_new_from_facture[chauffeurvehicule]' => 'Testing',
            'erp_devis_client_new_from_facture[creationcode]' => 'Testing',
            'erp_devis_client_new_from_facture[creationnom]' => 'Testing',
            'erp_devis_client_new_from_facture[creationprenom]' => 'Testing',
            'erp_devis_client_new_from_facture[creationdate]' => 'Testing',
            'erp_devis_client_new_from_facture[creationheure]' => 'Testing',
            'erp_devis_client_new_from_facture[modepaimement]' => 'Testing',
            'erp_devis_client_new_from_facture[numbercompte]' => 'Testing',
            'erp_devis_client_new_from_facture[montantsaisie]' => 'Testing',
            'erp_devis_client_new_from_facture[accomptesaisie]' => 'Testing',
            'erp_devis_client_new_from_facture[etatfacture]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpDevisClientNewFromFactures();
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
        $fixture->setModepaimement('My Title');
        $fixture->setNumbercompte('My Title');
        $fixture->setMontantsaisie('My Title');
        $fixture->setAccomptesaisie('My Title');
        $fixture->setEtatfacture('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpDevisClientNewFromFacture');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpDevisClientNewFromFactures();
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
        $fixture->setModepaimement('Value');
        $fixture->setNumbercompte('Value');
        $fixture->setMontantsaisie('Value');
        $fixture->setAccomptesaisie('Value');
        $fixture->setEtatfacture('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_devis_client_new_from_facture[code]' => 'Something New',
            'erp_devis_client_new_from_facture[codedevis]' => 'Something New',
            'erp_devis_client_new_from_facture[masociete]' => 'Something New',
            'erp_devis_client_new_from_facture[monadresse]' => 'Something New',
            'erp_devis_client_new_from_facture[montel]' => 'Something New',
            'erp_devis_client_new_from_facture[monfax]' => 'Something New',
            'erp_devis_client_new_from_facture[monregistre]' => 'Something New',
            'erp_devis_client_new_from_facture[monmatricule]' => 'Something New',
            'erp_devis_client_new_from_facture[clientcode]' => 'Something New',
            'erp_devis_client_new_from_facture[clientraison]' => 'Something New',
            'erp_devis_client_new_from_facture[clientnom]' => 'Something New',
            'erp_devis_client_new_from_facture[clientprenom]' => 'Something New',
            'erp_devis_client_new_from_facture[clienttel]' => 'Something New',
            'erp_devis_client_new_from_facture[clientfax]' => 'Something New',
            'erp_devis_client_new_from_facture[clientadresse]' => 'Something New',
            'erp_devis_client_new_from_facture[clientmatricule]' => 'Something New',
            'erp_devis_client_new_from_facture[totalht]' => 'Something New',
            'erp_devis_client_new_from_facture[tva]' => 'Something New',
            'erp_devis_client_new_from_facture[totaltva]' => 'Something New',
            'erp_devis_client_new_from_facture[remises]' => 'Something New',
            'erp_devis_client_new_from_facture[timbres]' => 'Something New',
            'erp_devis_client_new_from_facture[totalttc]' => 'Something New',
            'erp_devis_client_new_from_facture[chauffeurnom]' => 'Something New',
            'erp_devis_client_new_from_facture[chauffeurvehicule]' => 'Something New',
            'erp_devis_client_new_from_facture[creationcode]' => 'Something New',
            'erp_devis_client_new_from_facture[creationnom]' => 'Something New',
            'erp_devis_client_new_from_facture[creationprenom]' => 'Something New',
            'erp_devis_client_new_from_facture[creationdate]' => 'Something New',
            'erp_devis_client_new_from_facture[creationheure]' => 'Something New',
            'erp_devis_client_new_from_facture[modepaimement]' => 'Something New',
            'erp_devis_client_new_from_facture[numbercompte]' => 'Something New',
            'erp_devis_client_new_from_facture[montantsaisie]' => 'Something New',
            'erp_devis_client_new_from_facture[accomptesaisie]' => 'Something New',
            'erp_devis_client_new_from_facture[etatfacture]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/devis/client/new/from/factures/');

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
        self::assertSame('Something New', $fixture[0]->getModepaimement());
        self::assertSame('Something New', $fixture[0]->getNumbercompte());
        self::assertSame('Something New', $fixture[0]->getMontantsaisie());
        self::assertSame('Something New', $fixture[0]->getAccomptesaisie());
        self::assertSame('Something New', $fixture[0]->getEtatfacture());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpDevisClientNewFromFactures();
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
        $fixture->setModepaimement('Value');
        $fixture->setNumbercompte('Value');
        $fixture->setMontantsaisie('Value');
        $fixture->setAccomptesaisie('Value');
        $fixture->setEtatfacture('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/devis/client/new/from/factures/');
        self::assertSame(0, $this->repository->count([]));
    }
}
