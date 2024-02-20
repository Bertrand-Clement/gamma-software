<?php

namespace App\Manager;

use App\Entity\Band;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportManager
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function dataProcessing($filePath): void
    {
        $spreadsheet = IOFactory::load($filePath);

        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet->removeRow(1);
        $data = $activeSheet->toArray(null, true, true, true);

        foreach ($data as $row) {
            $band = new Band();
            $band
                ->setName($row['A'])
                ->setOrigin($row['B'])
                ->setCity($row['C'])
                ->setStartYear($row['D'])
                ->setSeparationYear($row['E'])
                ->setFounders($row['F'])
                ->setMembers($row['G'])
                ->setMusicalStyle($row['H'])
                ->setIntroduction($row['I']);
            $this->entityManager->persist($band);
        }
        $this->entityManager->flush();
    }
}
