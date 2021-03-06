<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user.name', __('User'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('product.name', __('Product'));
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
        $order = Order::findOrFail($id);
        $show = new Show($order);

        $show->field('id', __('Id'));
        $show->field('user.name', __('User'))->link('/admin/clients/' . $order->user->id);
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('product.name', __('Product'))->link('/admin/products/' . $order->product->id);
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
        $form = new Form(new Order());

//        $form->number('id', __('Id'))->disable();
//        $form->text('user.name', __('User'))->disable();
//        $form->text('email', __('Email'))->disable();
//        $form->text('product.name', __('Product'))->disable();
//        $form->text('created_at', __('Created at'))->disable();
//        $form->text('updated_at', __('Updated at'))->disable();

        return $form;
    }
}
