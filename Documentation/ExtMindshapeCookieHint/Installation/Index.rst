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


Installation
------------
- Please note: this plugin only works with Javascript activated
- After installing this extension you have to add the template
  mindshape Cookie Hint (mindshape\_cookie\_hint) in field Include
  static (from extensions).
  
  - Open the module  **template.**
  |img-6|
  
  - Choose the **page** where your **root template** is stored (normally the root page).
  |img-7|
  
  - Edit the **whole template record.**
  |img-8|
  
  - Open the tab  **Includes** , to include the static Template.
  |img-9|

- If you want to redirect the visitor to a specific site within the
  hint, keep in mind to add a hidden page to your website and relate
  this one within your typoscript setup by defining the constant
  “readmore” (more info in chapter “Configuration”).


