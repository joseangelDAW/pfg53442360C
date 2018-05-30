<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:26
 */

namespace App\Infrastructure\Controller;

use App\Application\News\InsertNews\InsertNews;
use App\Application\News\InsertNews\InsertNewsCommand;
use App\Application\News\ListNews\ListNews;
use App\Application\News\ListNews\ListNewsCommand;
use App\Infrastructure\Service\ReactRequestTransform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @param InsertNews            $insertNews
     * @param Request               $request
     * @param ReactRequestTransform $reactRequestTransform
     *
     * @return JsonResponse
     */
    public function insertEntry(
        InsertNews $insertNews,
        Request $request,
        ReactRequestTransform $reactRequestTransform
    ) {
        $item = $reactRequestTransform->transform($request);

        $output = $insertNews->handle(new InsertNewsCommand(
            $item['title'],
            $item['content']
        ));

        /*$output = $insertNews->handle(new InsertNewsCommand(
            $request->request->get("title"),
            $request->request->get("content")
        ));*/

        return $this->json($output);
    }


    /**
     * @param ListNews $listNews
     *
     * @return JsonResponse
     */
    public function listEntries(
        ListNews $listNews
    ) {
        $output = $listNews->handle(new ListNewsCommand());
        return $this->json($output);
    }
}