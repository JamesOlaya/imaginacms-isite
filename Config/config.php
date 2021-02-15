<?php

return [
  'name' => 'Isite',

  'modulesToManagePermissions' => [
    "Core",
    "Ilocations",
    "Icustom",
    "Iredirect",
    "Isearch",
    "Inotification",
    "Isite",
    "Iblog",
    "Ibanners",
    "Iprofile",
    "Media",
    "Slider",
    "Core",
    "Iforms",
    "Page",
    "Setting",
    "Menu",
    "Tag",
    "Translation",
    "Workshop",
    "User",
    "Dashboard",
    "Workshop"
  ],
  
  
  'livewireAlerts' => [
    'position' => 'top-end',
    'iconColor' => '#008640',
    "timer" => 5000,
    "timerProgressBar" => true
  ],

  /* Order By - Index */
  'orderBy' =>[
    'default' => 'recently',
    'options' => [
      'nameaz' => [
        'title' => 'icommerce::common.sort.name_a_z',
        'name' => 'nameaz',
        'order' => [
          'field' => "name",
          'way' => "asc",
        ]
      ],
      'nameza' => [
        'title' => 'icommerce::common.sort.name_z_a',
        'name' => 'nameza',
        'order' => [
          'field' => "name",
          'way' => "desc",
        ]
      ],
      'lowerprice' => [
        'title' => 'icommerce::common.sort.price_low_high',
        'name' => 'lowerprice',
        'order' => [
          'field' => "price",
          'way' => "asc",
        ]
      ],
      'higherprice' => [
        'title' => 'icommerce::common.sort.price_high_low',
        'name' => 'higherprice',
        'order' => [
          'field' => "price",
          'way' => "desc",
        ]
      ],
      'recently' => [
        'title' => 'icommerce::common.sort.recently',
        'name' => 'recently',
        'order' => [
          'field' => "created_at",
          'way' => "desc",
        ]
      ]
    ],
  ],

  /*Layout Products - Index */
  'layoutIndex' => [
    'default' => 'four',
    'options' => [
      'four' => [
        'name' => 'four',
        'class' => 'col-6 col-md-4 col-lg-3',
        'icon' => 'fa fa-th-large',
        'status' => true
      ],
      'three' => [
        'name' => 'three',
        'class' => 'col-6 col-md-4 col-lg-4',
        'icon' => 'fa fa-square-o',
        'status' => true
      ],
      'one' => [
        'name' => 'one',
        'class' => 'col-12',
        'icon' => 'fa fa-align-justify',
        'status' => true
      ],
    ]
  ]
  
];
