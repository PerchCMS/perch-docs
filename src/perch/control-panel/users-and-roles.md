---
title: Users and Roles
nav_groups:
  - primary
---

You can control who can edit what in your Perch site by way of our Users and Roles system.

In a default Perch install we create two roles. An Admin Role with the ability to fully manage the system and an Editor Role. Users given the Editor Role can edit content but not do things such as delete regions and choose a new template. The Editor Role essentially gives a set of permissions that most people would want content editors to have.

You can edit the default Role privileges to add or remove options.

## Creating a Role

You can also create specific Roles with privileges. If you have installed the Blog App and want to create a new user who can post to the Blog you would create a new Role – perhaps called “Blogger”, and check the options under Blog that you want to give them access to. Then create your user or users and give them the new Blogger role.

## Many Users can have the same Role – or you can create a Role per User

The concept of Roles and Users is more flexible than assign privileges directly to a user. It means that if you have lots of users set up who can do a certain set of actions and you then want to enable an extra action – perhaps due to installing a new add-on – you only need change the Role privileges and not every user.

If you want to develop a system whereby 10 users can all edit their own page then you can achieve that by creating a Role per user.

## Selecting which Roles can edit specific content

Once you have created a Role, go to any Perch Content and Select Region Options. In the Permissions section you will see your Roles listed. The default is Everyone. If you only want this to be editable by a particular Role or Roles change that selection.

## Role Actions

By default, when you create a new Role all Perch Content Regions will be set to Everyone as described above. Sometimes you will want to create a new Role that only has access to editing one area of the site or some specific content.

In order that you do not have to go around your entire site deselecting the Everyone permission we have added Role Actions.

Go to Users > Roles and select the Role you want to perform an action on. Click the Actions tab and you can there Revoke all privileges – this in effect removes the Everyone flag on all regions if set.

You can then go into the content you wish to allow this role to edit and give them access.
