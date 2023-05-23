---
title: Rendering Templates
nav_groups:
  - primary
---

Sometimes it’s useful to be able to render a set of data using a Perch template on the fly. Perhaps you’ve used `skip-template` to fetch an array, have done some work on that array, and then want to show it using the templating engine.

The `perch_template()` function enables you to do that.

```php
perch_template('content/article.html', array(
    'heading'=>'Hello world',
    'date'=>'2013-05-09 12:30:00',
));
```

The function renders the template specified by the first argument using the data array specified in the second.

The third argument, if given as `true`, will return the rendered HTML rather than echoing it.

The template file name must a path within the `templates` folder, not just the bare file name. This function is part of the Content app, so presumes a `perch:content` tag namespace.

## Parameters

| Type    | Description                                                                              |
| ------- | ---------------------------------------------------------------------------------------- |
| String  | Template path                                                                            |
| Array   | Data array                                                                               |
| Boolean | Set to `true` to have the rendered template returned instead of echoed. Default `false`. |

## Using repeaters

Pass data in an array to render using [repeater tags](/templates/repeaters/):

```php
perch_template('content/product.html', [
    'title' => 'Perch CMS',
    'desc' => 'Perch is a PHP content management system.',

    // render founders using repeater tags
    'founders' => [
      [
        'name' => 'Drew McLellan',
        'image' => '/images/drew.jpg',
        'twitter' => 'drewm',
      ],
      [
        'name' => 'Rachel Andrew',
        'image' => '/images/rachel.jpg',
        'twitter' => 'rachelandrew',
      ]
    ],
]);
```

```html
<h1><perch:content id="title"></h1>
<p><perch:content id="desc"></p>

<perch:repeater id="founders">
  <perch:before>
    <h2>Founders</h2>
    <ul>
  </perch:before>

    <li>
      <perch:content id="name">

      <a href="https://twitter.com/<perch:content id="twitter">">
        @<perch:content id="twitter">
      </a>

      <figure>
          <img src="<perch:content id="image">" alt="<perch:content id="name">">
      </figure>
    </li>

  <perch:after>
    </ul>
  </perch:after>
</perch:repeater>
```

## Rendering a list

`perch_template()` can also render multiple items in one go:

```php
perch_template('content/episodes', [
  [
    'title' => "How Can I Run Online Workshops?",
    'length' => '35 minutes',
    'guests' => [
      [
        'name' => 'Rachel Andrew',
      ],
    ]
  ],

  [
    'title' => "What's new in Microsoft Edge?",
    'length' => '39 minutes',
    'guests' => [
      [
        'name' => 'Stephanie Stimac',
      ],
      [
        'name' => 'Aaron Gustafson',
      ]
    ]
  ],

  [
    'title' => "What Is Ethical Design?",
    'length' => '44 minutes',
    'guests' => [
      [
        'name' => 'Trine Falbe',
      ],
      [
        'name' => 'Martin Michael Frederiksen',
      ]
    ]
  ],
]);
```

```html
<perch:before>
    <h1>Podcast episodes</h1>
    <ul>
</perch:before>

    <li>
        <h2><perch:content id="title"></h2>
        <p>
            Episode length: <perch:content id="length">
        </p>

        <perch:repeater id="guests">
            <perch:before>
                <h3>Guests</h3>
                <ul>
            </perch:before>

                <li><perch:content id="name"></li>

            <perch:after>
                </ul>
            </perch:after>
        </perch:repeater>
    </li>

<perch:after>
    </ul>
</perch:after>
```

## Rendering common HTML

In some projects you may find yourself reusing the same HTML in different parts of your PHP pages, but with different content:

```php
<?php if( !perch_member_has_tag('email-verified') ): ?>
  <div class="notification warning">
    <p>Your email address <?= perch_member_get('email') ?> is not verified.</p>
  </div>
<?php endif; ?>



<?php if( !perch_member_has_tag('premium') ): ?>
  <div class="notification info">
    <p>Upgrade to Premium to see a real unicorn.</p>
  </div>
<?php endif; ?>
```

Instead of writing and managing the same HTML markup in multiple files, you can render it with a single Perch template:

```php
if( !perch_member_has_tag('email-verified') ) {
  perch_template('util/notification.html', [
    'type' => 'warning',
    'message' => 'Your email address ' . perch_member_get('email') . ' is not verified.',
  ]);
}



if( !perch_member_has_tag('premium') ) {
  perch_template('util/notification.html', [
    'type' => 'info',
    'message' => 'Upgrade to Premium to see a real unicorn.',
  ]);
}
```

```html
<div class="notification <perch:content id="type">">
  <p><perch:content id="message"></p>
</div>
```
