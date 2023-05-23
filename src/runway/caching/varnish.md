---
title: Varnish
nav_groups:
  - primary
---

[Varnish](https://www.varnish-cache.org) is a caching HTTP reverse proxy that you install infront of your website. perch Runway has the ability to tell your Varnish server when pages have changed so that they can be purged from the cache.

## Configure

Open up your `perch/config/runway.php` file and look for the Varnish section. It looks like this:

```html
'varnish' => [
    'enabled' => false,
],
```

Enable Varnish support by setting `enabled` to `true`.

## Configuring your Varnish VCL

When a page is published, Runway will make an HTTP PURGE or BAN request to your Varnish server. You need to add rules to your VCL to respond to those requests.

The `PURGE` requests look like this:

    http://example.com/about-us

and the `BAN` requests contain a pattern, like this:

    http://example.com/products/([a-z0-9\-]+)/?$

You'll want to configure your Varnish server to only accept the PURGE and BAN requests from trusted sources. This is done by setting up an ACL.

Your VCL might look something like this:

```html
acl purge {
    "localhost";
    "192.168.55.0"/24;
}

sub vcl_backend_response {
	set beresp.http.x-url = bereq.url;
}

sub vcl_deliver {
	unset resp.http.x-url; # Optional
}

sub vcl_recv {
    # allow PURGE and BAN from localhost and 192.168.55...

    if (req.method == "PURGE") {
        if (!client.ip ~ purge) {
                return(synth(405,"Not allowed."));
        }
        return (purge);
    }

    if (req.method == "BAN") {
    	if (!client.ip ~ purge) {
    	        return(synth(405,"Not allowed."));
    	}
    	ban("obj.http.x-url ~ " + req.url); # req.url is a regex
    	return(synth(200, "Ban added"));
    }
}
```

Note: we're not 100% sure this is the optimal configuration. If you find problems or have improvements to suggest, we'd love to hear from you and make this documentation better.
