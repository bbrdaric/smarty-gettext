

# Introduction #

This project **enables full (n)gettext support in Smarty**. There is little to no custom built, no regular expressions, etc. but it completely relies on Smarty functionality (e.g. the Smarty compiler, etc.) reducing the risks of incompatibilities, reduction or replication of functionality.

You will still be able to use [Smarty variable modifiers](http://www.smarty.net/docs/en/language.modifiers.tpl) alongside with your translated texts without the need to save the translation in a variable before.

This project utilizes the built-in Smarty compiler to produce files that can be processed with xgettext to extract message-IDs in singular (gettext) or plural (ngettext) form. Basically it does nothing else but relying on the Smarty compiled templates ;) - sounds lame but it's an approach I haven't seen yet.

**Let's cut to the gist, show me some examples!**

# Requirements #
  * PHP with namespace support (>=5.3) and gettext (easiest way to check is [phpinfo()](http://php.net/manual/en/function.phpinfo.php))
  * Smarty >= 3.0
  * xgettext command line Utility
  * basic understanding of [Smarty variable modifiers](http://www.smarty.net/docs/en/language.modifiers.tpl)
  * Knowledge on how to work with (x|n)gettext and/or the required patience to read the [GNU gettext manual](http://www.gnu.org/software/gettext/manual/gettext.html) OR extrapolation skills from [O'Reilly's gettext tutorial](http://onlamp.com/pub/a/php/2002/06/13/php.html) :)
  * You _should_ be able to make sense of the following lines in PHP

```
<?php
// I18N support information here
$language = 'en';
putenv("LANG=$language"); 
setlocale(LC_ALL, $language);

// Set the text domain as 'messages'
$domain = 'messages';
bindtextdomain($domain, "/www/htdocs/site.com/locale"); 
textdomain($domain);

echo gettext("A string to be translated would go here");
?>
```

The example above is taken from [O'Reilly's gettext tutorial](http://onlamp.com/pub/a/php/2002/06/13/php.html)

The namespace support is not mandatory if you're willing to delete just three lines in the code :)

# Examples #

This is what a gettext call would look like in Smarty.
```
{"This is my first translation message"|gettext}
{_("This is my second translation message")}
```

Plural? Sure...
```
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}
```

[Variable Modifiers](http://www.smarty.net/docs/en/language.modifiers.tpl)? Here you go:

```
{"This is my first translation message all in upper case"|gettext|strtoupper}
```

BTW: I'm NOT taking ANY kind of credit for the examples above. That's all BUILT-IN into Smarty already out of the box by their [Variable Modifiers](http://www.smarty.net/docs/en/language.modifiers.tpl).

Setting locales from within a template:
```
{locale path='path/to/locales/directory' domain='messages'}
```

This is a custom Smarty function that just sets binds the text-domain as per [the bindtextdomain PHP function](http://php.net/manual/en/function.bindtextdomain.php). Additionally, it creates a stack of bound text-domains so you can nest templates and utilize different text-domain in child-templates

**parent template**
```
{locale path='path/to/first/locales/directory' domain='my_domain_1'}
{"This is my first translation message"|gettext}
{include file='include_me_please.tpl'}
{"This is my translation message after having used a different domain in the included template"|gettext}
```

**included template (include\_me\_please.tpl)**
```
{locale path='path/to/second/locales/directory' domain='my_domain_2'}
{"This is my just another translation message"|gettext}
{locale stack='pop'}
```

The last line in the included template, i.e. **{locale stack='pop'}** just re-creates the locale context of the parent. If you don't do this or forget to do so, the locale context, after Smarty returned to the **including template**, will remain the one of the **included template**. See [the example\_faulty\_pop example here](SmartyTemplateExamples#example_faulty_pop.php.md).

[Some more examples please...](http://code.google.com/p/smarty-gettext/wiki/SmartyTemplateExamples)

# xgettext && PO files #
All fine, but how can I extract the PO files from it? Don't worry, all [here](ExtractingPOFiles.md) :)

# Tested on #

Unix, Windows, MacOS (different versions, please report if it doesn't work for yours).

# Download #

You have got two options to download the sources of this project.

## SVN ##
Please see [this URL](http://code.google.com/p/smarty-gettext/source/checkout) for a SVN checkout. The command to checkout the sources to your local file-system would be:
```
svn checkout http://smarty-gettext.googlecode.com/svn/trunk/ smarty-gettext-read-only 
```

## Download zip/tar.gz ##
I've uploaded tar.gz and zip versions of the sources for easy download without the need for any SVN.

The latest files will always be available [here](http://code.google.com/p/smarty-gettext/downloads/list).

# Similar Projects #

Currently, there is just one other alternative for smarty gettext support: http://sourceforge.net/projects/smarty-gettext/ by Sagi Bashari and Vincenzo Buttazzo.

While this is a very good extension I didn't really see, why there should be a custom extension or syntax for gettext when Smarty itself already provides everything that's needed. It's still worth checking out, tho.

# Credits #

If someone knows who did the nice little man with the flags that I've used in the logo, please do let me know so I can give proper credit! I've just added the smarty lamp to the image. The image itself showed up when searching for 'i18n icon' on Google Images and it is linked from [this site](http://nuget.org/packages?q=i18N)

And obviously a BIG thanks to the Smarty and PHP community out there!