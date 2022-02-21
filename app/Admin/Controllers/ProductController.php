<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('category_id', __('Category'));
        $grid->column('price', __('Price'));
        $grid->column('preview_picture', __('Preview picture'));
        $grid->column('detail_picture', __('Detail picture'));
        $grid->column('preview_text', __('Preview text'));
        $grid->column('detail_text', __('Detail text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category.name', __('Category'));
        $show->field('price', __('Price'));
        $show->field('preview_picture', __('Preview picture'))->image();
        $show->field('detail_picture', __('Detail picture'))->image();
        $show->field('preview_text', __('Preview text'));
        $show->field('detail_text', __('Detail text'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
//        $form->number('category', __('Category'));
        $form->select('category_id')->options(Category::all()->pluck('name','id'));
        $form->number('price', __('Price'));
        $form->image('preview_picture', __('Preview picture'))->uniqueName();
        $form->image('detail_picture', __('Detail picture'))->uniqueName();
        $form->textarea('preview_text', __('Preview text'));
        $form->textarea('detail_text', __('Detail text'));

        return $form;
    }
}
