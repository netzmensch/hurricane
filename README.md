hurricane [![Build Status](https://travis-ci.org/netzmensch/hurricane.png?branch=master)](https://travis-ci.org/netzmensch/hurricane)
=========

Hurricane is a super slim and file based cms. You don't need any database or other prerequisites - only a basic webserver with php support.

features
--------
- simple markup
- easy extendable parser plugins for your content
- only plain php. you don't need all this framework bloatware for such a simple task
- build your page structure with simple txt files and folders

documentation
=============

write content
-------------
Hurricane manages a page tree based on the folder structure in root folder "page".

For example, if your page folder looks like this:

page/start.txt

page/subpage/contact.txt

then you can reach this content by following urls:

www.your_domain.com/start

www.your_domain.com/subpage/contact

and so on.

basic parsers
=============

paragraph
---------
This one is the simplest: every line in an page.txt file is an paragraph.

headlines
---------
If you want to add an headline, put some "+" in front of it. Every "+" stands for an higher head value.

for example:

"+Headline" stands for &lt;h1&gt;Headline&lt;/h1&gt;

"++Headline" stands for &lt;h2&gt;Headline&lt;/h2&gt;
...

bold text
---------
just wrap [b]the content[/b] and it will be bold.

link
----
the most powerful element of the web is the link. Basic syntax:

[link text,http://url.com]

for internal links do this:

[contact,/contact]

images
------
for default image support, add following:

[[image.jpg]]

The img path is relative to /page. The converted image tags contain the twitter bootstrap responsive class, so they will always fit to current screen size.
