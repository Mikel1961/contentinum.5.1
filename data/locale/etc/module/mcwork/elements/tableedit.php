<?php
return array(
    'attribute' => array(
        'class' => 'button-group right'
    ),
    'standards' => array(
        'edit' => array(
            'label' => '<i class="fa fa-pencil"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'Edit a item',
                'class' => 'small button',
                'role' => 'button'
            )
        ),
        'delete' => array(
            'label' => '<i class="fa fa-trash-o"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'Delete item',
                'class' => 'small button alert deleteitem',
                'role' => 'button'
            )
        ),
        'trash' => array(
            'label' => '<i class="fa fa-recycle"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'Item trash',
                'class' => 'button alert',
                'role' => 'button'
            )
        ),       
        'remove' => array(
            'label' => '<i class="fa fa-minus"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'Remove item',
                'class' => 'small button alert removeitem',
                'role' => 'button'
            )
        ),        
        'clear' => array(
            'label' => 'Clear',
            'attribs' => array(
                'title' => 'Empty cache',
                'class' => 'small button',
                'role' => 'button'
            )
        ),
        'display' => array(
            'label' => '<i class="fa fa-desktop"></i>',
            'href' => '#',
            'attribs' => array(
                'class' => 'small button'
            )
        ),
        'download' => array(
            'label' => '<i class="fa fa-download"></i>',
            'href' => '#',
            'attribs' => array(
                'class' => 'small button'
            )
        ),        
        'info' => array(
            'label' => '<i class="fa fa-gear"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'information to the data set',
                'class' => 'button',
                'role' => 'button'
            )
        ),
        'up' => array(
            'label' => '<i class="fa fa-arrow-up"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'move item up',
                'class' => 'button',
                'role' => 'button'
            )
        ),
        'down' => array(
            'label' => '<i class="fa fa-arrow-down"></i>',
            'href' => '#',
            'attribs' => array(
                'title' => 'move item down',
                'class' => 'button',
                'role' => 'button'
            )
        )        
    )
);