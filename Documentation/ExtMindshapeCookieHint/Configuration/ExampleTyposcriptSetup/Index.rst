.. include:: Images.txt

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Example Typoscript Setup
^^^^^^^^^^^^^^^^^^^^^^^^

To add custom settings for the extension, open your typoscript setup
as following:

- Open the module **template.**
- Choose the **page** where your **root template** is stored (normally the root page).
- Open the **Setup.**
|img-10|

- Enter your settings at the end of your **typoscript.**

The following example shows all usable settings for the extension:

::

	plugin.tx_mindshapecookiehint {
	  settings {
		#choose style between "dark" or "light" (optional, default: dark)
		style = dark
		#position on "top" or "bottom" of your website (optional, default: bottom)
		position = top
		#page-id for more details about your cookies (optional, default: - )
		readmore = 35
		#append the cookie to the bottom of your page so it doesn't overlap footer-content
		appendToBottom = 0
	  }
	  
	  _LOCAL_LANG.de {
		hint.learnMore = Weitere Informationen.
		hint.dismiss = OK
		hint.message = Diese Webseite verwendet Cookies, um die Bedienfreundlichkeit zu erhöhen.
	  }
	  
	  _LOCAL_LANG.default {
		hint.learnMore = More info.
		hint.dismiss = Got it
		hint.message = This website uses cookies to ensure you get the best experience on our website.
	  }
	}

As you can see, all texts can be manipulated for the default language
of your TYPO3-Website.

**Please note:** single quotes ' must be escaped with \' within your message or the box won't be shown in the frontend

