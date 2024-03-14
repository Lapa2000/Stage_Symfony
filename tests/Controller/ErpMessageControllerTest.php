<?php

namespace App\Test\Controller;

use App\Entity\ErpMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErpMessageControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/erp/message/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ErpMessage::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMessage index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'erp_message[code]' => 'Testing',
            'erp_message[idenvoie]' => 'Testing',
            'erp_message[idreception]' => 'Testing',
            'erp_message[titre]' => 'Testing',
            'erp_message[texte]' => 'Testing',
            'erp_message[fichier]' => 'Testing',
            'erp_message[etat]' => 'Testing',
            'erp_message[datecreation]' => 'Testing',
            'erp_message[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMessage();
        $fixture->setCode('My Title');
        $fixture->setIdenvoie('My Title');
        $fixture->setIdreception('My Title');
        $fixture->setTitre('My Title');
        $fixture->setTexte('My Title');
        $fixture->setFichier('My Title');
        $fixture->setEtat('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ErpMessage');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMessage();
        $fixture->setCode('Value');
        $fixture->setIdenvoie('Value');
        $fixture->setIdreception('Value');
        $fixture->setTitre('Value');
        $fixture->setTexte('Value');
        $fixture->setFichier('Value');
        $fixture->setEtat('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'erp_message[code]' => 'Something New',
            'erp_message[idenvoie]' => 'Something New',
            'erp_message[idreception]' => 'Something New',
            'erp_message[titre]' => 'Something New',
            'erp_message[texte]' => 'Something New',
            'erp_message[fichier]' => 'Something New',
            'erp_message[etat]' => 'Something New',
            'erp_message[datecreation]' => 'Something New',
            'erp_message[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/erp/message/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getIdenvoie());
        self::assertSame('Something New', $fixture[0]->getIdreception());
        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getTexte());
        self::assertSame('Something New', $fixture[0]->getFichier());
        self::assertSame('Something New', $fixture[0]->getEtat());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ErpMessage();
        $fixture->setCode('Value');
        $fixture->setIdenvoie('Value');
        $fixture->setIdreception('Value');
        $fixture->setTitre('Value');
        $fixture->setTexte('Value');
        $fixture->setFichier('Value');
        $fixture->setEtat('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/erp/message/');
        self::assertSame(0, $this->repository->count([]));
    }
}
