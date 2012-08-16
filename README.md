whm-assistant
========================

Notice
------

whm-assistant is still under construction and highly unstable.


Installation
------------

Download and place folder on server (apache & php5+). To access admin goto /admin eg semanticart.com.au/whm-assistant/admin


Adding a website
----------------

Your companies website should be placed in the folder: ./ci_contents/views/public/

Place all your websites files there. Remove the index.html file to delete the under construction notice. The pin for the under construction notice is '1989'


Sending invoices
----------------

First make sure you have setup your SMTP details in your profile page by clicking the profile icon next to 'sign out' on the navbar. 

Now you will be able to send invoices from the invoice tab.


Invoice template
----------------

The invoice template is located at: ./ci_contents/views/admin/accounts/invoices/invoice/pdf.php

Adding users
------------

To add new users click the profile link twice. 