# Smarty Template Examples #

# example\_00.php #
This is the basic example that will do for most people. You don't need to re-configure smarty or add functionality to it. It's just works out of the box. This will apply for most users.

## Smarty Template Code ##
You don't really have to do anything other than to what you're used to anyways in Smarty :) Just use the (n)gettext modifiers alongside with the parameters. See the [Smarty documentation](http://www.smarty.net/docs/en/language.modifiers.tpl)

```
Almost nothing to do, but 'gettexting' your way :).

When can you use this example?
  -- if you bind/set your text-domain from within your PHP application
  -- if you just use ONE text-domain for ALL TEMPLATES (does not matter if you have multiple for the rest of your PHP application)
  -- if you make sure that the right textdomain is set and bound when you call fetch/display the template

RUNNING THE EXAMPLE:
php example_00.php [locale]

{_("This is my first translation message")}
{"This is my yet another translation message with a custom modifier"|gettext|substr:0:60}
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}

```

## Running The Example ##
  1. cd to **./examples/i18n/smarty/**
  1. open example\_00.php in any editor of your choice
  1. replace lines 6 and 7 by including your Smarty class
  1. exit the editor and run the program by **php example\_00.php** or **php example\_00.php de\_DE** to force German locale or **php example\_00.php en\_GB** to force UK locale

## Output ##
```
Almost nothing to do, but 'gettexting' your way :). 

When can you use this example?
  -- if you bind/set your text-domain from within your PHP application 
  -- if you just use ONE text-domain for ALL TEMPLATES (does not matter if you have multiple for the rest of your PHP application)
  -- if you make sure that the right textdomain is set and bound when you call fetch/display the template

RUNNING THE EXAMPLE:
php example_00.php [locale]

en_GB locale: This is my first translated message
en_GB locale: This is yet another translated message with a 
en_GB locale: 1 comment
en_GB locale: 0 comments
en_GB locale: 10 comments
```

# example\_01.php #
This is an extended example that allows you to set the text-domain from within the template. It requires the registration of one Smarty function.

## Smarty Template Code ##
The only thing that's different from the previous example is the definition of the locale from within the template as you'll see in the first line. It sets the path and text-domain as defined by the [bindtextdomain function](http://php.net/manual/en/function.bindtextdomain.php)

```
{locale path=$path domain='messages'}

This is a very simple example that does nothing else but translate a few messages. It sets the locale at the beginning. If you use the standard text-domain, i.e. 'messages', you can also remove the domain declaration for the 'locale' Smarty function call in line 1 of this example.

RUNNING THE EXAMPLE:
php example_01.php [locale]

{"This is my first translation message"|gettext}
{"This is my yet another translation message with a custom modifier"|gettext|substr:0:60}
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}
```

## Running The Example ##
  1. cd to **./examples/i18n/smarty/**
  1. open example\_01.php in any editor of your choice
  1. replace line 7 by including your Smarty class and delete line 9
  1. exit the editor and run the program by:
    * **php example\_01.php**
    * **php example\_01.php de\_DE** to force German locale
    * **php example\_01.php en\_GB** to force UK locale

## Output ##

For the en\_GB locale the output is the following.
```
This is a very simple example that does nothing else but translate a few messages. It sets the locale at the beginning. If you use the standard text-domain, i.e. 'messages', you can also remove the domain declaration for the 'locale' Smarty function call in line 1 of this example.

RUNNING THE EXAMPLE:
php example_01.php [locale]

en_GB locale: This is my first translated message
en_GB locale: This is yet another translated message with a 
en_GB locale: 1 comment
en_GB locale: 0 comments
en_GB locale: 10 comments
```

# example\_02.php #
Example for **including** other templates whereas **the included template uses the same text-domain as the including template**.

## Smarty Template Code ##
### Including Template Code ###
Here you see the same call as in the previous example for the [bindtextdomain function](http://php.net/manual/en/function.bindtextdomain.php). Also we include another template here.
```
{locale path=$path domain='messages'}

This example includes another template that uses THE SAME text-domain as is used within this template. If you have a look at the included file, you will see that there IS NO 'locale' Smarty function all at the top.

RUNNING THE EXAMPLE:
php example_02.php [locale]

{"This is my first translation message"|gettext}
{"This is my yet another translation message with a custom modifier"|gettext|substr:0:60}
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
---INCLUDED FILE START---
{include file='example_included_file_with_same_domain.tpl'}
---INCLUDED END START---
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}
```

### Included Template Code ###
This is the template included from the template above. As you see there is no special magic in here. It again, same as example\_00, just uses the gettext [Smarty modifiers](http://www.smarty.net/docs/en/language.modifiers.tpl)
```
{"Actually we don't really have to do anything here"|gettext}
```

## Running The Example ##
  1. cd to **./examples/i18n/smarty/**
  1. open example\_02.php in any editor of your choice
  1. replace line 7 by including your Smarty class and delete line 9
  1. exit the editor and run the program by
    * **php example\_02.php**
    * **php example\_02.php de\_DE** to force German locale
    * **php example\_02.php en\_GB** to force UK locale

## Output ##

For the en\_GB locale the output is the following.
```
This example includes another template that uses THE SAME text-domain as is used within this template. If you have a look at the included file, you will see that there IS NO 'locale' Smarty function all at the top.

RUNNING THE EXAMPLE:
php example_02.php [locale]

en_GB locale: This is my first translated message
en_GB locale: This is yet another translated message with a 
en_GB locale: 1 comment
---INCLUDED FILE START---
en_GB locale: Actually we don't really have to do anything here

---INCLUDED FILE END---
en_GB locale: 0 comments
en_GB locale: 10 comments
```

# example\_03.php #
Example for including other templates whereas **the included template does NOT use the same text-domain as the including template**. This probably only will become relevant, once you decide to create different [po/mo  files](http://www.gnu.org/software/gettext/manual/gettext.html#PO-Files)

## Smarty Template Code ##
### Including Template Code ###
Basically this is the same as in example\_02 above.
```
{locale path=$path domain='messages'}

This example includes another template that uses A DIFFERENT text-domain as is used within this template.

RUNNING THE EXAMPLE:
php example_03.php [locale]

REMEMBER:
  -- We have to remember to POP the locale at the end of the included file so we get back the original 'do
  -- We can do this anywhere at the end of the file.
  -- If you don't do it the file that included this template will try to use the same 'domain' and you'll

{"This is my first translation message"|gettext}
{"This is my yet another translation message with a custom modifier"|gettext|substr:0:60}
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
---INCLUDED FILE START---
{include file='example_included_file_with_different_domain.tpl'}
---INCLUDED END START---
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}

```
### Included Template Code ###
This is where the 'magic' happens. As you see in the code below the included template has it's own locale definition. It uses a custom text-domain called **custom\_domain**.

You will also notice one oddity at the bottom of the file, the **{locale stack='pop'}** definition. This is because we need to set the locales back to the ones from the including template. Otherwise (as you'll see in the next example) gettext tries to get the translation of the including template from the wrong dictionary files. The **embed** function, when used with the **pop** parameter automatically restores the text-domain from the including template. Since it's implemented as a stack, templates can be nested to any hierarchical level.

```
{locale path=$path domain='custom_domain'}
{"We have included this file from somewhere else and we use a custom domain for this"|gettext}
{locale stack='pop'}
```

## Running The Example ##
  1. cd to **./examples/i18n/smarty/**
  1. open example\_03.php in any editor of your choice
  1. replace line 7 by including your Smarty class and delete line 9
  1. exit the editor and run the program by:
    * **php example\_03.php**
    * **php example\_03.php de\_DE** to force German locale
    * **php example\_03.php en\_GB** to force UK locale


## Output ##

For the en\_GB locale the output is the following.
```
This example includes another template that uses A DIFFERENT text-domain as is used within this template. If you have a look at the included file, you will see that there IS A 'locale' Smarty function call at the top.

RUNNING THE EXAMPLE:
php example_03.php [locale]

REMEMBER:
  -- We have to remember to POP the locale at the end of the included file so we get back the original 'domain'. 
  -- We can do this anywhere at the end of the file.
  -- If you don't do it the file that included this template will try to use the same 'domain' and you'll most likely get odd results. (see example_faulty_pop.php)

en_GB locale: This is my first translated message
en_GB locale: This is yet another translated message with a 
en_GB locale: 1 comment
---INCLUDED FILE START---

en_GB locale: We have included this file from somewhere else and we use a custom domain for this


---INCLUDED FILE END---
en_GB locale: 0 comments
en_GB locale: 10 comments
```

# example\_faulty\_pop.php #
This basically shows how example\_03 from above could be done wrong and what the consequences are.

## Smarty Template Code ##
### Including Template Code ###
Again, this is the same as in example\_02 and example\_03 above.
```
{locale path=$path domain='messages'}

This example includes another template that uses A DIFFERENT text-domain as is used within this template.

IN THIS EXAMPLE WE DO NOT POP AT THE END OF THE INCLUDED TEMPLATE. YOU WILL SEE THAT THE REMAINDER OF THE

RUNNING THE EXAMPLE:
php example_faulty_pop.php [locale]


{"This is my first translation message"|gettext}
{"This is my yet another translation message with a custom modifier"|gettext|substr:0:60}
{"%d comment"|ngettext:"%d comments":1|sprintf:1}
---INCLUDED FILE START---
{include file='example_included_file_with_different_domain_without_pop.tpl'}
---INCLUDED END START---
{"%d comment"|ngettext:"%d comments":0|sprintf:0}
{"%d comment"|ngettext:"%d comments":10|sprintf:10}
```
### Included Template Code ###
You will notice that this is the same as in example\_03 from above, with the exception that we do not have the **locale pop** command at the end of the file. Thus when logic is returned to the including template, the text-domain of the included template (**custom\_domain**) will be used with the odd result that most likely (n)gettext is unable to lookup the message-IDs in the dictionary and cannot translate the text.

```
{locale path=$path domain='custom_domain'}
{"We have included this file from somewhere else and we use a custom domain for this"|gettext}
```

## Running The Example ##
  1. cd to **./examples/i18n/smarty/**
  1. open example\_faulty\_pop.php in any editor of your choice
  1. replace line 7 by including your Smarty class and delete line 9
  1. exit the editor and run the program by:
    * **php example\_faulty\_pop.php**
    * **php example\_faulty\_pop.php de\_DE** to force German locale
    * **php example\_faulty\_pop.php en\_GB** to force UK locale

## Output ##

For the en\_GB locale the output is the following.
```
This example includes another template that uses A DIFFERENT text-domain as is used within this template. If you have a look at the included file, you will see that there IS A 'locale' Smarty function call at the top.

IN THIS EXAMPLE WE DO NOT POP AT THE END OF THE INCLUDED TEMPLATE. YOU WILL SEE THAT THE REMAINDER OF THE INCLUDING TEMPLATE WILL NOT BE TRANSLATED, I.E. THE STRING IN THE TEMPLATE WILL BE ECHOED WITHOUT TRANSLATION

RUNNING THE EXAMPLE:
php example_faulty_pop.php [locale]


en_GB locale: This is my first translated message
en_GB locale: This is yet another translated message with a 
en_GB locale: 1 comment
---INCLUDED FILE START---

en_GB locale: We have included this file from somewhere else and we use a custom domain for this

---INCLUDED FILE END---
0 comments
10 comments
```

Notice that after the logic returned to the including template, i.e. after the line **---INCLUDED FILE END---** messages are not translated anymore...