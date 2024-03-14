<?php

namespace App\Test\Controller;

use App\Entity\ErpParametres;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpParametresControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/parametres/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpParametres::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpParametre index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_parametre[code]' => 'Testing',
            'erp_parametre[logosociete]' => 'Testing',
            'erp_parametre[nomsociete]' => 'Testing',
            'erp_parametre[adresse]' => 'Testing',
            'erp_parametre[codepostal]' => 'Testing',
            'erp_parametre[ville]' => 'Testing',
            'erp_parametre[tel]' => 'Testing',
            'erp_parametre[tel2]' => 'Testing',
            'erp_parametre[fax]' => 'Testing',
            'erp_parametre[registrecommerce]' => 'Testing',
            'erp_parametre[matriculefiscale]' => 'Testing',
            'erp_parametre[rib]' => 'Testing',
            'erp_parametre[creepar]' => 'Testing',
            'erp_parametre[datecreation]' => 'Testing',
            'erp_parametre[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpParametres();
        $fixture->setCode('My Title');
        $fixture->setLogosociete('My Title');
        $fixture->setNomsociete('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCodepostal('My Title');
        $fixture->setVille('My Title');
        $fixture->setTel('My Title');
        $fixture->setTel2('My Title');
        $fixture->setFax('My Title');
        $fixture->setRegistrecommerce('My Title');
        $fixture->setMatriculefiscale('My Title');
        $fixture->setRib('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpParametre');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpParametres();
        $fixture->setCode('Value');
        $fixture->setLogosociete('Value');
        $fixture->setNomsociete('Value');
        $fixture->setAdresse('Value');
        $fixture->setCodepostal('Value');
        $fixture->setVille('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setRegistrecommerce('Value');
        $fixture->setMatriculefiscale('Value');
        $fixture->setRib('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_parametre[code]' => 'Something New',
            'erp_parametre[logosociete]' => 'Something New',
            'erp_parametre[nomsociete]' => 'Something New',
            'erp_parametre[adresse]' => 'Something New',
            'erp_parametre[codepostal]' => 'Something New',
            'erp_parametre[ville]' => 'Something New',
            'erp_parametre[tel]' => 'Something New',
            'erp_parametre[tel2]' => 'Something New',
            'erp_parametre[fax]' => 'Something New',
            'erp_parametre[registrecommerce]' => 'Something New',
            'erp_parametre[matriculefiscale]' => 'Something New',
            'erp_parametre[rib]' => 'Something New',
            'erp_parametre[creepar]' => 'Something New',
            'erp_parametre[datecreation]' => 'Something New',
            'erp_parametre[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/parametres/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getLogosociete());
        self::assertSame('Something New', $fixture[0]->getNomsociete());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getCodepostal());
        self::assertSame('Something New', $fixture[0]->getVille());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getTel2());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getRegistrecommerce());
        self::assertSame('Something New', $fixture[0]->getMatriculefiscale());
        self::assertSame('Something New', $fixture[0]->getRib());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpParametres();
        $fixture->setCode('Value');
        $fixture->setLogosociete('Value');
        $fixture->setNomsociete('Value');
        $fixture->setAdresse('Value');
        $fixture->setCodepostal('Value');
        $fixture->setVille('Value');
        $fixture->setTel('Value');
        $fixture->setTel2('Value');
        $fixture->setFax('Value');
        $fixture->setRegistrecommerce('Value');
        $fixture->setMatriculefiscale('Value');
        $fixture->setRib('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/parametres/');
        self::assertSame(0, $this->repository->count([]));
    }
}
