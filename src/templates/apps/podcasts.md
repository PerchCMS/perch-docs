---
title: Podcasts App
nav_groups:
  - primary
---

## Namespaces

The Perch Podcasts App uses the namespace `perch:podcasts`.

## Master templates

| Template | Used for |
|-|-|
| show.html | A show |
| episode.html | An individual podcast episode |

## Template IDs

| Value | Description |
|-|-|
| showID | |
| showTitle | Title of the Show |
| showSlug | Slug which can be used in a URL to identify the show |
| showCreated | Creation date of this show |
| showEpisodeCount | Number of episodes for this show |
| episodeID | |
| episodeNumber | Number of this episode |
| episodeTitle | Title of the episode |
| episodeSlug | |
| episodeDate | |
| episodeDuration | |
| episodeDurationHMS | |
| episodeFile | |
| episodeFileSize | |
| episodeFileType | |
| episodeStatus | |
| episodeTrackedURL | |


## Editing templates

The default templates are stored inside the `perch_podcasts/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_podcasts/templates/podcasts` to `/perch/templates/podcasts` and then make your changes.

If a template has the same name in this folder as the template in the `perch_podcasts` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.
