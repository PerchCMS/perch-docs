---
title: YouTube
nav_groups:
  - primary
---

The YouTube field type makes it easy to embed a YouTube video into a page. The field type provides a single text input field, into which the user pastes the public URL of a video on YouTube. The field type then uses Google's YouTube API to fetch the details of the video for embedding in the page.

## Installation and configuration

Download and place the `youtube` folder within `perch/addons/fieldtypes`.

Due to the way the Google API for YouTube works, there are a number of configuration steps required before you will be able to fetch video details from YouTube. These steps should only have to be followed once per site.

1. Go to [console.developers.google.com](https://console.developers.google.com)
2. Create a new project (e.g. _Jones Partners Website_)
3. Go to _APIs & auth_ in the menu, then to the _APIs_ subitem and select _YouTube Data API_ from the big list
4. Click _Enable API_
5. Go to Credentials in the menu
6. Click _Add Credentials_ and choose _API key_
7. Create a _Server_ key. You are given the option to limit by IP address, but you can leave that box empty and proceed
8. Copy the API key - this is what you're after
9. In your `config/config.php` add the following, adding your nice new API key


    `define('PERCH_YOUTUBE_API_KEY', 'your API key');`


## Usage

Once installed, the field type can be used in a template by setting the `type` attribute to `youtube`:

```html
<perch:content id="video" type="youtube" label="YouTube URL">
```

The field type retrieves lots of information about the video from YouTube. You can select what information the tag should output using the `output` attribute. For example, the following would output the `iframe` embed code:

```html
<perch:content id="video" type="youtube" width="800" label="YouTube URL" output="embed">
```

The `width` and `height` attributes can be used to control the display size of the player.

There are a number of different `output` options you can use.

|Ouput value|Description|
|-|-|
|url|The URL of the video on YouTube|
|embed|An HTML `iframe` video player|
|title|The title of the video|
|description|The description of the video|
|user_name|The name of the channel|
|date|The date the video was published|
|thumb|The URL of a thumbnail image|
|thumb_w|The width of the thumbnail image|
|thumb_h|The height of the thumbnail images|
|width|The width of the video|
|height|The height of the video|
|likes|The number of likes (thumbs up) the video has received|
|dislikes|The number of dislikes the video has received|
|favorites|The number of times the video has been marked as a favorite|
|comments|The number of numbskull comments left about the video|
|views|The number of views the video has received|
|duration|The duration of the video in `hours:minutes:seconds`|

## Player parameters

When embedding a player, there are a number of [player parameters](https://developers.google.com/youtube/player_parameters#Parameters) offered to customise the behaviour look of the player. If using the `output="embed"` option, these parameters can be added as attributes on the template tag.

```html
<perch:content id="video" type="youtube" width="800" label="YouTube URL" output="embed" autoplay="1" modestbranding="1">
```
