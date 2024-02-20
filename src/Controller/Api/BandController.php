<?php

namespace App\Controller\Api;

use App\Entity\Band;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/band')]
class BandController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'api_band_index')]
    public function index(SerializerInterface $serializer): JsonResponse
    {
        $bands = $this->entityManager->getRepository(Band::class)->findAll();
        $data = $serializer->normalize($bands, 'json', ['groups' => ['api_band_index']]);

        return new JsonResponse($data);
    }

    #[Route('/data/{id}', name: 'api_band_data')]
    public function data(SerializerInterface $serializer, int $id): Response
    {
        /** @var Band $band */
        $band = $this->entityManager->getRepository(Band::class)->find($id);
        if (null === $band) {
            return new JsonResponse('Le groupe n\'existe pas', 404);
        }
        $data = $serializer->normalize($band, 'json', ['groups' => ['api_band_index']]);

        return new JsonResponse($data);
    }

    #[Route('/edit/{id}', name: 'api_band_edit')]
    public function edit(Request $request, int $id): Response
    {
        /** @var Band $band */
        $band = $this->entityManager->getRepository(Band::class)->find($id);
        if (null === $band) {
            return new JsonResponse('Le groupe n\'existe pas', 404);
        }
        $data = json_decode($request->getContent(), true);
        $band
            ->setName($data['name'])
            ->setOrigin($data['origin'])
            ->setCity($data['city'])
            ->setStartYear($data['startYear'])
            ->setSeparationYear($data['separationYear'])
            ->setFounders($data['founders'])
            ->setMembers($data['members'])
            ->setMusicalStyle($data['musicalStyle'])
            ->setIntroduction($data['introduction']);
        try {
            $this->entityManager->persist($band);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return new JsonResponse('Erreur lors de l\'édition du groupe', 500);
        }

        return new JsonResponse('Groupe édité avec succès', 200);
    }

    #[Route('/delete/{id}', name: 'api_band_delete')]
    public function delete(int $id): JsonResponse
    {
        /** @var Band $band */
        $band = $this->entityManager->getRepository(Band::class)->find($id);
        if (null === $band) {
            return new JsonResponse('Le groupe n\'existe pas', 404);
        }

        try {
            $this->entityManager->remove($band);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return new JsonResponse('Erreur lors de la suppression du groupe', 500);
        }

        return new JsonResponse('Groupe supprimé avec succès', 200);
    }
}
