<?php namespace Anomaly\LinksBlockExtension\Http\Controller\Admin;

use Anomaly\LinksBlockExtension\Link\Form\LinkFormBuilder;
use Anomaly\LinksBlockExtension\Link\Table\LinkTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class LinksController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param LinkTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(LinkTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param LinkFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(LinkFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param LinkFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(LinkFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
