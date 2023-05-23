---
title: Routing
layout: section.html
nav_groups:
  - primary
---

Runway uses your web server's ability to _rewrite_ incoming URLs and point those requests to a single entry point. This is sometimes called a _Front Controller_. For Runway, it's the `start.php` script that handles all page requests.

Once Runway has received the request, it then decides which page to display. This is known as _routing_ - deciding which page will the incoming request be routed to.

When you add a page in Runway, it has a URL. By default, this is used by the router, and any direct request of that page's URL will result in a direct match. For some sites, that's all you'll need.

For sites with more complex requirements, you can add additional pattern to match more complex URLs and route them through to your pages. For example, a blog might have URLs like this:

```unix
/blog/2014/my-post-title
```

No page with that URL exists, as you don't have a new page for every blog post in the database. Instead, you'd create a route to match it and direct that request through to the page that displays blog posts. The URL pattern for the route might look like this:

```unix
blog/[year]/[slug]
```

The `[bracketed]` items are placeholders, we call them tokens. The `[year]` token matches a four-digit year, and then `[slug]` token matches a lowercase letters, numbers and dashes sequence. There are tokens for numbers `[i]`, letters `[a]`, dates `[isodate]` and so on, for the common parts of a URL you might want to find.

## Adding a route

By default, the router will map any incoming request to a page with the same URL. Adding an additional routes to the page is done through the Perch control panel.

Find the page a click on *Page Options*. Find the *Routes* section, and add a new route at the bottom. Delete a route by clearing the field.

When writing a pattern for the route, you don't need to include the opening or trailing slash, and Runway will strip those for you if you do.

## Route matching order

The order in which routes are matched can be quite important. It's possible to create multiple patterns that could theoretically match the same URL, and the router will stop at the first that matches. It's therefore important to carefully manage the order.

To do this, go to the *Routes* section under *Pages*. The routes are listed in order, first to last. Select the *Reorder* option in the smartbar, and then drag and drop the routes to change the order. Select *Save Changes* when you're done.
