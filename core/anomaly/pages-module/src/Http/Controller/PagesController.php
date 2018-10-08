<?php namespace Anomaly\PagesModule\Http\Controller;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\PagesModule\Page\PageResolver;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class PagesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PagesController extends PublicController
{

    /**
     * Return a rendered page.
     *
     * @param  PageResolver $resolver
     * @param  ViewTemplate $template
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    public function view(PageResolver $resolver, ViewTemplate $template)
    {
        if (!$page = $resolver->resolve()) {

            abort(404);
        }

        /* inicio codio de redirecciones */
        if( $page->getPath() == "/" && count($_GET) > 0 ){

            $rutas_old = [
                'empresa' => [
                    'historia',
                    'nuestra-filosofia',
                    'politica-empresa',
                    'calidad',
                    'responsabilidad-social-corporativa',
                ],

                'servicios' => [
                    'servicios',
                    'transporte-terrestre',
                    'transporte-maritimo',
                    'transporte-aereo',
                    'aduanas',
                    'proyectos',
                    'almacenes',
                    'seguros',
                    'cross-trade',
                ],

                'noticias' => [
                    'noticias',
                ],

                'contacto' => [
                    'contacto',
                ],

                'inicio' => [
                    'inicio',
                ],

            ];

            $rutas = [
                'inicio' => [
                    'es' => "/inicio",
                    'en' => "/home",
                ],
                'servicios' => [
                    'es' => "/servicios",
                    'en' => "/services",
                ],
                'empresa' => [
                    'es' => "/empresa",
                    'en' => "/company",
                ],
                'noticias' => [
                    'es' => "/noticias",
                    'en' => "/news",
                ],
                'contacto' => [
                    'es' => "/contacto",
                    'en' => "/contact",
                ],

            ];

            if( isset( $_GET['p'] ) && $_GET['p'] != '' ){
                if( $_GET['p'] == "utilidades" ){
                    abort(404);
                }

                foreach ( $rutas_old as $k => $value ) {
                    //var_dump ( $rutas_old[$k] );

                    if (in_array($_GET['p'], $rutas_old[$k])) {
                        //var_dump("ruta: " . $k);

                        if (isset($_GET['i'])) {
                            return redirect('/en'.$rutas[$k]['en'], 301);
                        } else {
                            return redirect($rutas[$k]['es'], 301);
                        }
                    }
                }
                return redirect('/', 301);
            }

        }
        /* fin codio de redirecciones */

        $page->setCurrent(true);
        $page->setActive(true);

        $type    = $page->getType();
        $handler = $type->getHandler();

        $template->set('page', $page);

        $handler->make($page);

        return $page->getResponse();
    }

    /**
     * Preview a page.
     *
     * @param  ViewTemplate                                    $template
     * @param  PageRepositoryInterface                         $pages
     * @param                                                  $id
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    public function preview(ViewTemplate $template, PageRepositoryInterface $pages, $id)
    {
        if (!$page = $pages->findByStrId($id)) {
            abort(404);
        }

        $type    = $page->getType();
        $handler = $type->getHandler();

        $template->set('page', $page);

        $handler->make($page);

        return $page->getResponse();
    }

    /**
     * Redirect elsewhere.
     *
     * @param  PageRepositoryInterface $pages
     * @param  Redirector              $redirector
     * @param  Route                   $route
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function redirect(PageRepositoryInterface $pages, Redirector $redirector, Route $route)
    {
        if ($to = array_get($route->getAction(), 'anomaly.module.pages::redirect')) {
            return $redirector->to($to, array_get($route->getAction(), 'status', 302));
        }

        /* @var PageInterface $page */
        if ($page = $pages->find(array_get($route->getAction(), 'anomaly.module.pages::page', 0))) {
            return $redirector->to($page->getPath(), array_get($route->getAction(), 'status', 302));
        }

        abort(404);
    }
}
