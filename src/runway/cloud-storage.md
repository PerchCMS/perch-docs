---
title: Cloud Storage
nav_groups:
  - primary
---

Those wishing to store assets on remote cloud storage systems such as Amazon S3 or Rackspace Cloud Files, and perhaps serve them through a CDN, can do so through Runway's extension to the [Perch Resource Buckets](/perch/resources/buckets/) system.

Once a bucket is defined in your bucket list as using a cloud storage system, any files written to that bucket will be uploaded to the cloud storage system automatically.

**Note:** when using cloud storage, assets must first be temporarily uploaded to your site before being transferred to storage, so your default resource bucket still needs to be configured and writable.

By default, Perch Runway has support for Dropbox, Amazon S3 and the OpenStack Object Storage API as used by Rackspace Cloud Files and others.

- Using [Dropbox](/runway/cloud-storage/dropbox/)
- Using [Amazon S3](/runway/cloud-storage/amazon/)
- Using [OpenStack Object Storage](/runway/cloud-storage/openstack/) for services like Cloud Files
