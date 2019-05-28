In Perch there are various ways of creating repeating content, most of which happen via your templates rather than by messing around inside a PHP loop on the page! In this post I’ll introduce them and suggest when you might use each one.

## Looping in your template

Our “big three” methods for repeating content happen within your templates and settings in the Perch Admin, and don’t require any code to be added to your pages.

These methods are applicable in Perch and Perch Runway sites.

### Multiple Item Regions

The simplest looping structure in Perch is accessed by setting a Region in your Perch Control Panel to “Allow Multiple Items”, You can do this when defining the region, or at any time later in Region Options.

Once a Region can allow multiple items your content editor will be able to Save and Add Another item – so the template you have chosen for that Region will repeat as many times as they add content.

When setting up your Region you can choose to edit in List/Detail Mode or “All on one page”. If using List/Detail setting a title on one field of your template will mean that Perch will use that field as the name of the instance in the List Mode. If nothing has a title attribute set to true Perch will list the items as “Item 1”, “Item 2” and so on.

### Repeaters

Where a Region set to allow Multiple Items repeats the entire template, a Repeater is like a mini template within a template. It enables the looping of small amounts of content.

A good example of where a Repeater is useful is if you want your content editor to add multiple images to a Blog Post or article. If you wrap that section of the template in a Repeater they will be able to add as many as they require.

### Blocks

In Perch and Perch Runway 2.8 we introduced the powerful Blocks feature. With Blocks you can create a template that enables a content editor to not only add multiple pieces of content – but also choose the template to use. A good example of that is when creating a photo essay type post, where you might want a large image, an image with text or text only.

A Blocks template can contain Repeaters, it can also be the template used in a Multiple Item Region.

### Which template looping structure to use

I’ve described three methods of looping through content – so which should you choose? It really comes down to the content in question. If your content is a defined object – a product, an article or an event I would define it as a template and set the Region to allow Multiple Items. This keeps the data about each product together – and enables you to then reuse that content using perch_content_custom.

Inside that template you might want to allow multiple images to be added, or allow a data table to be built up of product attributes and here a Repeater would be useful.

You might want the content editor to have flexibility in part of the template and so you could add a Blocks section. If you intend to reuse the content around the site then it would be a good plan to have some fixed fields in the template before starting the Blocks. For a product you might have a title, description and price set as required fields outside of the Blocks and then give the content editor freedom to add the more description information around the product. The fixed fields would ensure you had the data you needed for a homepage listing of items or other feature.

### Template tips for Looping Structures

When creating a template for a Region that will allow multiple items you can use `<perch:before></perch:before>` tags to output content before the repeating section and `<perch:after></perch:after>` to output content after the repeating section. Before and After can be handy if you want to output an opening and closing list element or wrap the repeating block in some other markup.

You can use Perch Conditionals to add markup, classes or even to exclude items when displaying the template. For example, if your template opens with an li element and you want to add a class of odd to the odd elements you could use perch:every.

Beware PHP limits on fields! If you have very large templates, particularly those with many repeaters in them you can hit up against resource limits on your server.

The problematic setting is a PHP setting called max_input_vars, you can read about how to change it here. If you are editing a Multiple Item Region “All on one page” a quick fix is to change to List/Detail Mode in the Region Settings. If the issue is that you have large templates of Repeaters or Blocks then you will need to change this in your php.ini.

## Looping on your page

Most of the time in Perch and Perch Runway you’ll be using the above methods to loop through the content of your Regions. We try as much as possible to keep you out of the PHP. No-one wants to have to poke around in a PHP loop to display content.

However if you are reusing content or have made use of Collections in Perch Runway you may want to get content back and loop through it on the page.

### perch_content_custom()

When you use `perch_content_custom()` rather than `perch_content()` you can retrieve your content and pass in a template which will display the content just as if you defined the template in the Perch Admin for that region. With custom content however you are able to filter the content or display content normally displayed with one template using a different one.

Templates passed in via perch_content_custom are the same as any other Perch Templates and can contain before and after tags and conditionals.

If you are used to working with PHP and want to do some other processing or loop through the template using PHP then adding skip-template with a value of true will return your content as an associative array. You can then do with it whatever you like.

As a tip, if you use skip-template with the option return-html set to true you get the templated HTML back as part of the array, with the key ‘html’. If you want to do some processing but also then display the templated data, this will save you another trip to the database.

### perch_collection()

For Perch Runway users you also have `perch_collection()`. This behaves much like perch_content_custom but is for displaying Collection data.

## Wrapping up

That’s all you need to know about how to loop through data in Perch. As with many things we try and offer flexibility, this means you can provide the best editing experience based on the type of content that needs to be edited. We also want to ensure that you can reuse your content and that pages load quickly.

If you are unsure about the best way to create editing forms for your data then do pop into the [forum](https://community.perchcms.com/forum/) and ask us. If you can explain the data you need to make editable and what you will need to do with it we can help you work out the best architecture.
