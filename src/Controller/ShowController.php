<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;
use Mobile_Detect;

class ShowController extends AbstractController
{
    #[Route('/show_category/{type}-{tag}-{area}-{year}.html', name: 'show_category', defaults: ['type' => "1", 'tag' => 0, 'area' => 0, 'year' => 0])]
    public function category(VodListRepository $vodListRepository, Request $request, PaginatorInterface $paginator, Mobile_Detect $mobile_Detect, $type, $tag, $area, $year): Response
    {
        $query = $vodListRepository->createQueryBuilder();
        if ($type) {
            $query->field('type_id_1')->equals((int)$type);
        }

        if ($tag) {
            $query->field('type_name')->equals($tag);
        }

        if ($area) {
            $query->field('area')->equals($area);
        }

        if ($year) {
            $query->field('year')->equals($year);
        }

        $typeList = Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml');


        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/show/index.html.twig';
            $pg  = 24;

        } else {
            $tmp = 'show/index.html.twig';
            $pg  = 32;
        }


        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $pg
        );

        $pagination->setTemplate('show/pagination.html.twig');

        return $this->render($tmp, [
            'pagination' => $pagination,
            'typeList'   => $typeList,
            'tag'        => $tag,
            'type'       => $type,
            'area'       => $area,
            'year'       => $year,
        ]);
    }


}
