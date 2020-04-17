---
title: File
nav_groups:
  - primary
---

Using `type="file"` will present the user with a file upload to upload a document from their computer.

```html
<perch:content id="report" type="file" label="Annual report PDF">
```

As with image, using the tag in your template as it is will simply print out the path to the file. To create a download link you need to use the tag as the href of a link.

```html
<a href="<perch:content id="report" type="file" label="Annual report PDF">">Download my file</a>
```

## Resource buckets

The `bucket` attribute can be used to set the resource bucket the file should be stored in.

```html
<perch:content id="report" type="file" label="Annual report PDF" bucket="reports">
```

## Default file type in Assets chooser

You can use the `file-type` attribute to have the Assets chooser filter existing assets by the specified file type.


```html
<perch:content id="podcast_episode" type="file" file-type="audio" label="Podcast Episode">
```

### File types

| Type    | File extensions                                                      |
| ------- | -------------------------------------------------------------------- |
| img     | jpg, png, gif, svg, jpeg, webp                                       |
| doc     | doc, docx, pdf, odt, fodt, epub, mobi, docm, rtf, txt, uof, wpd, wri |
| sheet   | xls, csv, ods, fods, xlsx                                            |
| audio   | mp3, wav, ogg, flac, m4a, wma, aiff, mp2, spx, ra, rm, mid           |
| video   | mp4, mov, webm, ogv, aff, 3gp, asf, avi, flv, mpeg, mpg, wmv, m4v    |
| pres    | ppt, pps, odp, fodp, key, pez, pptx, pot, opt                        |
| archive | zip                                                                  |
| file    | All the above file extensions except those listed for the `img` type |



## Output options

As well as outputting the file path, you can use a file tag to output other types of information about the file. This is done with the optional `output` attribute.

### Values for the output attribute

|Value|Description|
|-|-|
|path|Default. The path to the file.|
|filename|The name of the file.|
|mime|The mime type of the file, if known.|
|size|The size of the file. Can be used with the format attribute (e.g. format="MB").|
