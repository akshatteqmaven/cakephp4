<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <h3><?= __('Users List') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <!-- <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('Image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr> -->
            </thead>
            <tbody>


                <!-- <tr>
                            <td><?= $sno++ ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->phone) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->gender) ?></td>
                            <td><?= $this->Html->image(h($user->file), (array('width' => '50px'))) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__(''), ['action' => 'view', $user->id], ['class' => 'fa-solid fa-eye']) ?>
                                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'fa-solid fa-pen-to-square']) ?>
                                <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class' => 'fa-solid fa-trash', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr> -->

                <div class="container profile-page">
                    <div class="row">
                        <?php

                        foreach ($users as $user) : ?>
                            <div class="col-lg-6">
                                <div class="card profile-header">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="profile-image float-md-right"> <?= $this->Html->image(h($user->file)) ?> </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <h3 class="m-t-0 m-b-0"><?= h($user->name) ?></h3>
                                                <span class="job_post"><?= h($user->email) ?></span>
                                                <p><?= h($user->phone) ?></p>
                                                <p><?= h($user->gender) ?></p>

                                                <div>
                                                    <button class="btn btn"> <?= $this->Html->link(__(''), ['action' => 'view', $user->id], ['class' => 'fa-solid fa-eye']) ?>
                                                    </button>
                                                    <button class="btn btn"> <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'fa-solid fa-pen-to-square']) ?>
                                                    </button>
                                                    <button class="btn btn"> <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class' => 'fa-solid fa-trash', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<!-- ------------------------------------------------------------- -->
<br>
<br>
<br>
<br>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container profile-page">




    <style>
        h3 {
            font-weight: bold;
        }

        .card {
            background: antiquewhite;
            margin-bottom: 26px;
            border: 0;
            border-radius: 4.188rem;
            width: 100%;
        }

        .card .body {
            font-size: 2rem;
            color: #424242;
            padding: 2px;
            font-weight: bold;
        }

        .profile-page .profile-header {
            position: relative
        }

        .profile-page .profile-header .profile-image img {
            border-radius: 41px;
            height: 12rem;
            width: 16.5rem;
            border: 0px;
            margin-top: 3.8rem;
        }

        .profile-page .profile-header .social-icon a {
            margin: 0 5px
        }

        .profile-page .profile-sub-header {
            min-height: 60px;
            width: 100%
        }

        .profile-page .profile-sub-header ul.box-list {
            display: inline-table;
            table-layout: fixed;
            width: 100%;
            background: #eee
        }

        .profile-page .profile-sub-header ul.box-list li {
            border-right: 1px solid #e0e0e0;
            display: table-cell;
            list-style: none
        }

        .profile-page .profile-sub-header ul.box-list li:last-child {
            border-right: none
        }

        .profile-page .profile-sub-header ul.box-list li a {
            display: block;
            padding: 15px 0;
            color: #424242
        }
    </style>