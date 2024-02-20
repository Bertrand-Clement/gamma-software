<?php

namespace App\Controller;

use App\Entity\Band;
use App\Form\BandType;
use App\Form\UploadType;
use App\Manager\ImportManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BandController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_band_index')]
    public function index(Request $request, ImportManager $importManager)
    {
        $form = $this->createForm(UploadType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $request->files->get('upload')['file'];
            $uploadsDirectory = $this->getParameter('kernel.project_dir').'/public/uploads';
            try {
                $file->move($uploadsDirectory, $file->getClientOriginalName());
                $importManager->dataProcessing($uploadsDirectory.'/'.$file->getClientOriginalName());

                $this->addFlash('success', 'Fichier importé avec succès');
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Erreur lors de l\'import du fichier');
            }

            return $this->redirectToRoute('app_band_index');
        }

        $bands = $this->entityManager->getRepository(Band::class)->findAll();

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
            'bands' => $bands,
        ]);
    }

    #[Route('/band/edit/{id}', name: 'app_band_edit')]
    public function edit(Request $request, int $id): Response
    {
        /** @var Band $band */
        $band = $this->entityManager->getRepository(Band::class)->find($id);
        if (null === $band) {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm(BandType::class, $band);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->entityManager->persist($band);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Erreur lors de l\'édition du groupe');
            }

            $this->addFlash('success', 'Groupe édité avec succès');

            return $this->redirectToRoute('app_band_index');
        }

        return $this->render('band/edit.html.twig', [
            'form' => $form->createView(),
            'band' => $band,
        ]);
    }

    #[Route('/band/delete/{id}', name: 'app_band_delete')]
    public function delete(int $id): Response
    {
        /** @var Band $band */
        $band = $this->entityManager->getRepository(Band::class)->find($id);
        if (null === $band) {
            throw $this->createNotFoundException();
        }

        try {
            $this->entityManager->remove($band);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            $this->addFlash('danger', 'Erreur lors de la suppression du groupe');
        }

        $this->addFlash('success', 'Groupe supprimé avec succès');

        return $this->redirectToRoute('app_band_index');
    }
}
