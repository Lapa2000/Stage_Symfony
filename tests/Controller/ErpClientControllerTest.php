<?php

namespace App\Test\Controller;

use App\Entity\ErpClient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_client[code]' => 'Testing',
            'erp_client[anciencode]' => 'Testing',
            'erp_client[typearrive]' => 'Testing',
            'erp_client[surnom]' => 'Testing',
            'erp_client[prenomdeux]' => 'Testing',
            'erp_client[pays]' => 'Testing',
            'erp_client[ville]' => 'Testing',
            'erp_client[codepostal]' => 'Testing',
            'erp_client[raisonsocial]' => 'Testing',
            'erp_client[registrecommerce]' => 'Testing',
            'erp_client[matriculefiscal]' => 'Testing',
            'erp_client[rib]' => 'Testing',
            'erp_client[intervenanttype]' => 'Testing',
            'erp_client[intervenantnom]' => 'Testing',
            'erp_client[cin]' => 'Testing',
            'erp_client[cheque]' => 'Testing',
            'erp_client[nom]' => 'Testing',
            'erp_client[prenom]' => 'Testing',
            'erp_client[adresse]' => 'Testing',
            'erp_client[tel]' => 'Testing',
            'erp_client[tel2]' => 'Testing',
            'erp_client[fax]' => 'Testing',
            'erp_client[email]' => 'Testing',
            'erp_client[website]' => 'Testing',
            'erp_client[image]' => 'Testing',
            'erp_client[creepar]' => 'Testing',
            'erp_client[datecreation]' => 'Testing',
            'erp_client[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpClient();
        $fixture->setCode('My Title');
        $fixture->setAnciencode('My Title');
        $fixture->setTypearrive('My Title');
        $fixture->setSurnom('My Title');
        $fixture->setPrenomdeux('My Title');
        $fixture->setPays('My Title');
        $fixture->setVille('My Title');
        $fixture->setCodepostal('My Title');
        $fixture->setRaisonsocial('My Title');
        $fixture->setRegistrecommerce('My Title');
        $fixture->setMatriculefiscal('My Title');
        $fixture->setRib('My Title');
        $fixture->setIntervenanttype('My Title');
        $fixture->setIntervenantnom('My Title');
        $fixture->setCin('My Title');
        $fixture->setCheque('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setTel('My Title');
        $fixture->setTel2('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setWebsite('My Title');
        $fixture->setImage('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpClient();
        $fixture->setCode('Value');
        $fixture->setAnciencode('Value');
        $fixture->setTypearrive('Value');
        $fixture->setSurnom('Value');
        $fixture->setPrenomdeux('Value');
        $fixture->setPays('Value');
        $fixture->setVille('Value');
        $fixture->setCodepostal('Value');
        $fixture->setRaisonsocial('Value');
        $fixture->setRegistrecommerce('Value');
        $fixture->setMatriculefiscal('Value');
        $fixture->setRib('Value');
        $fixture->setIntervenanttype('Value');
        $fixture->setIntervenantnom('Value');
        $fixture->setCin('Value');
        $fixture->setCheque('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_client[code]' => 'Something New',
            'erp_client[anciencode]' => 'Something New',
            'erp_client[typearrive]' => 'Something New',
            'erp_client[surnom]' => 'Something New',
            'erp_client[prenomdeux]' => 'Something New',
            'erp_client[pays]' => 'Something New',
            'erp_client[ville]' => 'Something New',
            'erp_client[codepostal]' => 'Something New',
            'erp_client[raisonsocial]' => 'Something New',
            'erp_client[registrecommerce]' => 'Something New',
            'erp_client[matriculefiscal]' => 'Something New',
            'erp_client[rib]' => 'Something New',
            'erp_client[intervenanttype]' => 'Something New',
            'erp_client[intervenantnom]' => 'Something New',
            'erp_client[cin]' => 'Something New',
            'erp_client[cheque]' => 'Something New',
            'erp_client[nom]' => 'Something New',
            'erp_client[prenom]' => 'Something New',
            'erp_client[adresse]' => 'Something New',
            'erp_client[tel]' => 'Something New',
            'erp_client[tel2]' => 'Something New',
            'erp_client[fax]' => 'Something New',
            'erp_client[email]' => 'Something New',
            'erp_client[website]' => 'Something New',
            'erp_client[image]' => 'Something New',
            'erp_client[creepar]' => 'Something New',
            'erp_client[datecreation]' => 'Something New',
            'erp_client[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getAnciencode());
        self::assertSame('Something New', $fixture[0]->getTypearrive());
        self::assertSame('Something New', $fixture[0]->getSurnom());
        self::assertSame('Something New', $fixture[0]->getPrenomdeux());
        self::assertSame('Something New', $fixture[0]->getPays());
        self::assertSame('Something New', $fixture[0]->getVille());
        self::assertSame('Something New', $fixture[0]->getCodepostal());
        self::assertSame('Something New', $fixture[0]->getRaisonsocial());
        self::assertSame('Something New', $fixture[0]->getRegistrecommerce());
        self::assertSame('Something New', $fixture[0]->getMatriculefiscal());
        self::assertSame('Something New', $fixture[0]->getRib());
        self::assertSame('Something New', $fixture[0]->getIntervenanttype());
        self::assertSame('Something New', $fixture[0]->getIntervenantnom());
        self::assertSame('Something New', $fixture[0]->getCin());
        self::assertSame('Something New', $fixture[0]->getCheque());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getTel2());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getWebsite());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpClient();
        $fixture->setCode('Value');
        $fixture->setAnciencode('Value');
        $fixture->setTypearrive('Value');
        $fixture->setSurnom('Value');
        $fixture->setPrenomdeux('Value');
        $fixture->setPays('Value');
        $fixture->setVille('Value');
        $fixture->setCodepostal('Value');
        $fixture->setRaisonsocial('Value');
        $fixture->setRegistrecommerce('Value');
        $fixture->setMatriculefiscal('Value');
        $fixture->setRib('Value');
        $fixture->setIntervenanttype('Value');
        $fixture->setIntervenantnom('Value');
        $fixture->setCin('Value');
        $fixture->setCheque('Value');
        $fixture->setNom('Value');
        $fixture->setPrenom('Value');
        $fixture->setAdresse('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setEmail('Value');
        $fixture->setWebsite('Value');
        $fixture->setImage('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/client/');
        self::assertSame(0, $this->repository->count([]));
    }
}
