# Perch documentation

[![Netlify Status](https://api.netlify.com/api/v1/badges/ccb393d4-f23f-47e2-a569-8cd648a191f9/deploy-status)](https://app.netlify.com/sites/perchdocs/deploys)

All CSS changes are made in the pattern library. The build process for the docs then pulls the compiled CSS from the pattern library into the docs build.

## To install the pattern library

```unix
cd perch-docs/patterns
npm install
```

and then to run it:

```unix
gulp
```

this should watch for changes and rebuild the CSS.

## To install the docs 

```unix
cd perch-docs
npm install
```

Once the pattern library is running (and therefore fresh CSS is being built) you can build the docs:

```unix
node build
```

The built output goes into the `public` folder. You can point a web server at that. The node module `http-server` is quite useful for this.

```sudo systemctl restart apache2 and sudo systemctl restart nginx```
