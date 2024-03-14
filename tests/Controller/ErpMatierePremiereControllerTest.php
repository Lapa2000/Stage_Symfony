<?php

namespace App\Test\Controller;

use App\Entity\ErpMatierePremiere;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpMatierePremiereControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/matiere/premiere/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpMatierePremiere::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMatierePremiere index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_matiere_premiere[code]' => 'Testing',
            'erp_matiere_premiere[codeproduit]' => 'Testing',
            'erp_matiere_premiere[image]' => 'Testing',
            'erp_matiere_premiere[nom]' => 'Testing',
            'erp_matiere_premiere[description]' => 'Testing',
            'erp_matiere_premiere[type]' => 'Testing',
            'erp_matiere_premiere[categorie]' => 'Testing',
            'erp_matiere_premiere[methodeapprovisionement]' => 'Testing',
            'erp_matiere_premiere[puvht]' => 'Testing',
            'erp_matiere_premiere[tva]' => 'Testing',
            'erp_matiere_premiere[puvttc]' => 'Testing',
            'erp_matiere_premiere[remisemax]' => 'Testing',
            'erp_matiere_premiere[unitestock]' => 'Testing',
            'erp_matiere_premiere[fournisseur]' => 'Testing',
            'erp_matiere_premiere[dateachat]' => 'Testing',
            'erp_matiere_premiere[creepar]' => 'Testing',
            'erp_matiere_premiere[datecreation]' => 'Testing',
            'erp_matiere_premiere[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMatierePremiere();
        $fixture->setCode('My Title');
        $fixture->setCodeproduit('My Title');
        $fixture->setImage('My Title');
        $fixture->setNom('My Title');
        $fixture->setDescription('My Title');
        $fixture->setType('My Title');
        $fixture->setCategorie('My Title');
        $fixture->setMethodeapprovisionement('My Title');
        $fixture->setPuvht('My Title');
        $fixture->setTva('My Title');
        $fixture->setPuvttc('My Title');
        $fixture->setRemisemax('My Title');
        $fixture->setUnitestock('My Title');
        $fixture->setFournisseur('My Title');
        $fixture->setDateachat('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMatierePremiere');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMatierePremiere();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPuvht('Value');
        $fixture->setTva('Value');
        $fixture->setPuvttc('Value');
        $fixture->setRemisemax('Value');
        $fixture->setUnitestock('Value');
        $fixture->setFournisseur('Value');
        $fixture->setDateachat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_matiere_premiere[code]' => 'Something New',
            'erp_matiere_premiere[codeproduit]' => 'Something New',
            'erp_matiere_premiere[image]' => 'Something New',
            'erp_matiere_premiere[nom]' => 'Something New',
            'erp_matiere_premiere[description]' => 'Something New',
            'erp_matiere_premiere[type]' => 'Something New',
            'erp_matiere_premiere[categorie]' => 'Something New',
            'erp_matiere_premiere[methodeapprovisionement]' => 'Something New',
            'erp_matiere_premiere[puvht]' => 'Something New',
            'erp_matiere_premiere[tva]' => 'Something New',
            'erp_matiere_premiere[puvttc]' => 'Something New',
            'erp_matiere_premiere[remisemax]' => 'Something New',
            'erp_matiere_premiere[unitestock]' => 'Something New',
            'erp_matiere_premiere[fournisseur]' => 'Something New',
            'erp_matiere_premiere[dateachat]' => 'Something New',
            'erp_matiere_premiere[creepar]' => 'Something New',
            'erp_matiere_premiere[datecreation]' => 'Something New',
            'erp_matiere_premiere[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/matiere/premiere/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getCodeproduit());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getCategorie());
        self::assertSame('Something New', $fixture[0]->getMethodeapprovisionement());
        self::assertSame('Something New', $fixture[0]->getPuvht());
        self::assertSame('Something New', $fixture[0]->getTva());
        self::assertSame('Something New', $fixture[0]->getPuvttc());
        self::assertSame('Something New', $fixture[0]->getRemisemax());
        self::assertSame('Something New', $fixture[0]->getUnitestock());
        self::assertSame('Something New', $fixture[0]->getFournisseur());
        self::assertSame('Something New', $fixture[0]->getDateachat());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMatierePremiere();
        $fixture->setCode('Value');
        $fixture->setCodeproduit('Value');
        $fixture->setImage('Value');
        $fixture->setNom('Value');
        $fixture->setDescription('Value');
        $fixture->setType('Value');
        $fixture->setCategorie('Value');
        $fixture->setMethodeapprovisionement('Value');
        $fixture->setPuvht('Value');
        $fixture->setTva('Value');
        $fixture->setPuvttc('Value');
        $fixture->setRemisemax('Value');
        $fixture->setUnitestock('Value');
        $fixture->setFournisseur('Value');
        $fixture->setDateachat('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/matiere/premiere/');
        self::assertSame(0, $this->repository->count([]));
    }
}
