<?php

namespace App\Test\Controller;

use App\Entity\ErpBonDeReceptionFournisseur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpBonDeReceptionFournisseurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/bon/de/reception/fournisseur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpBonDeReceptionFournisseur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpBonDeReceptionFournisseur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_bon_de_reception_fournisseur[code]' => 'Testing',
            'erp_bon_de_reception_fournisseur[codedevis]' => 'Testing',
            'erp_bon_de_reception_fournisseur[masociete]' => 'Testing',
            'erp_bon_de_reception_fournisseur[monadresse]' => 'Testing',
            'erp_bon_de_reception_fournisseur[montel]' => 'Testing',
            'erp_bon_de_reception_fournisseur[monfax]' => 'Testing',
            'erp_bon_de_reception_fournisseur[monregistre]' => 'Testing',
            'erp_bon_de_reception_fournisseur[monmatricule]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientcode]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientraison]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientnom]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientprenom]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clienttel]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientfax]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientadresse]' => 'Testing',
            'erp_bon_de_reception_fournisseur[clientmatricule]' => 'Testing',
            'erp_bon_de_reception_fournisseur[totalht]' => 'Testing',
            'erp_bon_de_reception_fournisseur[totaltva]' => 'Testing',
            'erp_bon_de_reception_fournisseur[remises]' => 'Testing',
            'erp_bon_de_reception_fournisseur[timbres]' => 'Testing',
            'erp_bon_de_reception_fournisseur[totalttc]' => 'Testing',
            'erp_bon_de_reception_fournisseur[chauffeurnom]' => 'Testing',
            'erp_bon_de_reception_fournisseur[chauffeurvehicule]' => 'Testing',
            'erp_bon_de_reception_fournisseur[creationcode]' => 'Testing',
            'erp_bon_de_reception_fournisseur[creationnom]' => 'Testing',
            'erp_bon_de_reception_fournisseur[creationprenom]' => 'Testing',
            'erp_bon_de_reception_fournisseur[creationdate]' => 'Testing',
            'erp_bon_de_reception_fournisseur[creationheure]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpBonDeReceptionFournisseur();
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
        self::assertPageTitleContains('ErpBonDeReceptionFournisseur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpBonDeReceptionFournisseur();
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
            'erp_bon_de_reception_fournisseur[code]' => 'Something New',
            'erp_bon_de_reception_fournisseur[codedevis]' => 'Something New',
            'erp_bon_de_reception_fournisseur[masociete]' => 'Something New',
            'erp_bon_de_reception_fournisseur[monadresse]' => 'Something New',
            'erp_bon_de_reception_fournisseur[montel]' => 'Something New',
            'erp_bon_de_reception_fournisseur[monfax]' => 'Something New',
            'erp_bon_de_reception_fournisseur[monregistre]' => 'Something New',
            'erp_bon_de_reception_fournisseur[monmatricule]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientcode]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientraison]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientnom]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientprenom]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clienttel]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientfax]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientadresse]' => 'Something New',
            'erp_bon_de_reception_fournisseur[clientmatricule]' => 'Something New',
            'erp_bon_de_reception_fournisseur[totalht]' => 'Something New',
            'erp_bon_de_reception_fournisseur[totaltva]' => 'Something New',
            'erp_bon_de_reception_fournisseur[remises]' => 'Something New',
            'erp_bon_de_reception_fournisseur[timbres]' => 'Something New',
            'erp_bon_de_reception_fournisseur[totalttc]' => 'Something New',
            'erp_bon_de_reception_fournisseur[chauffeurnom]' => 'Something New',
            'erp_bon_de_reception_fournisseur[chauffeurvehicule]' => 'Something New',
            'erp_bon_de_reception_fournisseur[creationcode]' => 'Something New',
            'erp_bon_de_reception_fournisseur[creationnom]' => 'Something New',
            'erp_bon_de_reception_fournisseur[creationprenom]' => 'Something New',
            'erp_bon_de_reception_fournisseur[creationdate]' => 'Something New',
            'erp_bon_de_reception_fournisseur[creationheure]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/bon/de/reception/fournisseur/');

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
        $fixture = new ErpBonDeReceptionFournisseur();
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

        self::assertResponseRedirects('/erp/bon/de/reception/fournisseur/');
        self::assertSame(0, $this->repository->count([]));
    }
}
