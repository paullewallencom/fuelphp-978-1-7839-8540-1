<?php

\Nos\I18n::current_dictionary('noviusos_comments::common');

return array(
    'data_mapping' => array(
        'comments_count' => array(
            'title' => __('Comments'),
            'cellFormatters' => array(
                'center' => array(
                    'type' => 'css',
                    'css' => array('text-align' => 'center'),
                ),
                'link' => array(
                    'type' => 'link',
                    'action' => array(
                        'action' => 'nosTabs',
                        'tab' => array(
                            'url' => 'admin/noviusos_comments/comment/appdesk?model={{_model}}&id={{_id}}',
                            'label' => __('Comments for ‘{{title}}’'),
                        ),
                    ),
                ),
            ),
            'value' => function ($item) {
                return $item->is_new() ? 0 : \Nos\Comments\Model_Comment::count(
                    array(
                        'where' => array(array('comm_foreign_model' => get_class($item),'comm_foreign_id' => $item->id)),
                    )
                );
            },
            'sorting_callback' => function (&$query, $sortDirection) {
                $model = $query->model();
                $prefix = $model::prefix();

                $join = array();
                $query->_join_relation('comments', $join);
                $query->group_by($join['alias_from'].'.'.$prefix.'id');
                $query->order_by(\Db::expr('COUNT(*)'), $sortDirection);
            },
            'width' => 100,
            'ensurePxWidth' => true,
            'allowSizing' => false,
        ),
    ),
    'actions' => array(
        'comments' => array(
            'label' => __('Comments'),
            'icon' => 'comment',
            'targets' => array(
                'grid' => true,
                'toolbar-edit' => true,
            ),
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/noviusos_comments/comment/appdesk?model={{_model}}&id={{_id}}',
                    'label' => strtr(__('Comments for ‘{{title}}’'), array(
                        '{{title}}' => '{{_title}}',
                    )),
                    'iconUrl' => \Config::icon('noviusos_comments', 16),
                ),
            ),
            'visible' => function ($params) {
                return !isset($params['item']) || !$params['item']->is_new();
            },
            'disabled' =>
            function ($item) {
                return ($item->is_new() || !\Nos\Comments\Model_Comment::count(array(
                    'where' => array(
                        array(
                            'comm_foreign_model' => get_class($item),
                            'comm_foreign_id' => $item->id
                        )
                    ),
                ))) ? __('This item has no comments.') : false;
            },
        ),
    ),
);
