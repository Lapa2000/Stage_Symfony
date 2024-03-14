<?php

namespace App\Test\Controller;

use App\Entity\AvoirClientsHistory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvoirClientsHistoryControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/clients/history/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(AvoirClientsHistory::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AvoirClientsHistory index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'avoir_clients_history[code]' => 'Testing',
            'avoir_clients_history[modepaimement]' => 'Testing',
            'avoir_clients_history[numerocompte]' => 'Testing',
            'avoir_clients_history[codeclient]' => 'Testing',
            'avoir_clients_history[codefacture]' => 'Testing',
            'avoir_clients_history[montanttotalfacture]' => 'Testing',
            'avoir_clients_history[montantsaisie]' => 'Testing',
            'avoir_clients_history[ancienmontant]' => 'Testing',
            'avoir_clients_history[payetawa]' => 'Testing',
            'avoir_clients_history[restantmazal]' => 'Testing',
            'avoir_clients_history[datemontant]' => 'Testing',
            'avoir_clients_history[creepar]' => 'Testing',
            'avoir_clients_history[datecreation]' => 'Testing',
            'avoir_clients_history[datemodification]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirClientsHistory();
        $fixture->setCode('My Title');
        $fixture->setModepaimement('My Title');
        $fixture->setNumerocompte('My Title');
        $fixture->setCodeclient('My Title');
        $fixture->setCodefacture('My Title');
        $fixture->setMontanttotalfacture('My Title');
        $fixture->setMontantsaisie('My Title');
        $fixture->setAncienmontant('My Title');
        $fixture->setPayetawa('My Title');
        $fixture->setRestantmazal('My Title');
        $fixture->setDatemontant('My Title');
        $fixture->setCreepar('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setDatemodification('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AvoirClientsHistory');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirClientsHistory();
        $fixture->setCode('Value');
        $fixture->setModepaimement('Value');
        $fixture->setNumerocompte('Value');
        $fixture->setCodeclient('Value');
        $fixture->setCodefacture('Value');
        $fixture->setMontanttotalfacture('Value');
        $fixture->setMontantsaisie('Value');
        $fixture->setAncienmontant('Value');
        $fixture->setPayetawa('Value');
        $fixture->setRestantmazal('Value');
        $fixture->setDatemontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'avoir_clients_history[code]' => 'Something New',
            'avoir_clients_history[modepaimement]' => 'Something New',
            'avoir_clients_history[numerocompte]' => 'Something New',
            'avoir_clients_history[codeclient]' => 'Something New',
            'avoir_clients_history[codefacture]' => 'Something New',
            'avoir_clients_history[montanttotalfacture]' => 'Something New',
            'avoir_clients_history[montantsaisie]' => 'Something New',
            'avoir_clients_history[ancienmontant]' => 'Something New',
            'avoir_clients_history[payetawa]' => 'Something New',
            'avoir_clients_history[restantmazal]' => 'Something New',
            'avoir_clients_history[datemontant]' => 'Something New',
            'avoir_clients_history[creepar]' => 'Something New',
            'avoir_clients_history[datecreation]' => 'Something New',
            'avoir_clients_history[datemodification]' => 'Something New',
        ]);

        self::assertResponseRedirects('/clients/history/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCode());
        self::assertSame('Something New', $fixture[0]->getModepaimement());
        self::assertSame('Something New', $fixture[0]->getNumerocompte());
        self::assertSame('Something New', $fixture[0]->getCodeclient());
        self::assertSame('Something New', $fixture[0]->getCodefacture());
        self::assertSame('Something New', $fixture[0]->getMontanttotalfacture());
        self::assertSame('Something New', $fixture[0]->getMontantsaisie());
        self::assertSame('Something New', $fixture[0]->getAncienmontant());
        self::assertSame('Something New', $fixture[0]->getPayetawa());
        self::assertSame('Something New', $fixture[0]->getRestantmazal());
        self::assertSame('Something New', $fixture[0]->getDatemontant());
        self::assertSame('Something New', $fixture[0]->getCreepar());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getDatemodification());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new AvoirClientsHistory();
        $fixture->setCode('Value');
        $fixture->setModepaimement('Value');
        $fixture->setNumerocompte('Value');
        $fixture->setCodeclient('Value');
        $fixture->setCodefacture('Value');
        $fixture->setMontanttotalfacture('Value');
        $fixture->setMontantsaisie('Value');
        $fixture->setAncienmontant('Value');
        $fixture->setPayetawa('Value');
        $fixture->setRestantmazal('Value');
        $fixture->setDatemontant('Value');
        $fixture->setCreepar('Value');
        $fixture->setDatecreation('Value');
        $fixture->setDatemodification('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/clients/history/');
        self::assertSame(0, $this->repository->count([]));
    }
}
