<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Project';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('project_name', __('Project name'));
        $grid->column('description', __('Description'));
        $grid->column('success', __('Success'));
        $grid->column('technologies', __('Technologies'));
        $grid->column('release_date', __('Release date'));
        $grid->column('client_name', __('Client name'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Project::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('project_name', __('Project name'));
        $show->field('description', __('Description'));
        $show->field('success', __('Success'));
        $show->field('technologies', __('Technologies'));
        $show->field('release_date', __('Release date'));
        $show->field('client_name', __('Client name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project());

        $form->text('project_name', __('Project name'));
        $form->editor('description', __('Description'));
        $form->editor('success', __('Success'));
        $form->tags('technologies', __('Technologies'));
        $form->date('release_date', __('Release date'));
        $form->text('client_name', __('Client name'));
        $form->multipleMediaLibrary('images')->allowExtensions(['images/*']);
        $form->multipleMediaLibrary('videos')->allowExtensions(['video/*']);

        return $form;
    }
}
