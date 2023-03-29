<?php 

namespace App\Controller;

use Exception;
use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class SwitchLocaleController extends AbstractController
{
    /**
     * @Route(
     *      {
     *          "en": "/locale/update/{locale<fr|en>}",
     *          "fr": "/locale/modifier/{locale<fr|en>}",    
     *      },
     *      name="app_locale_update",
     *      methods={"GET"}
     * )
     * @param Request $request
     * @param RouterInterface $router
     * @param string $locale
     * @param RedirectResponse
     */
    public function updateLocale(Request $request, RouterInterface $router, string $locale): RedirectResponse
    {
        $referrer = $request->headers->get('referer');

        if(
            $referrer === null || u($referrer)->ignoreCase()->startsWith($request->getSchemeAndHttpHost() === false)
        ) {
            return $this->redirectToRoute('home');
        }

        $path = parse_url($referrer, PHP_URL_PATH);

        if(is_string($path) === false) {
            throw new BadRequestHttpException();
        }

        try {
            $routerParameters = $router->match($path);
        } catch(Exception $error) {
            return $this->redirectToRoute(
                'home',
                ['_locale' => $locale]
            );
        }

        return $this->redirectToRoute(
            $routerParameters['_route'],
            [
                '_locale' => $locale,
                'id' => $routerParameters['id'] ?? null,
            ]
        );
    }
}