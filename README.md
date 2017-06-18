# Test2
Test for Year in industry placement

PHP, HTML, JavaScript programming task
======================================

The file `orderdata` contains records of order data. Each record has a
customer id, email address, the total number of orders placed and the total
order value.

The file format is described in the file. Lines beginning with `#` are comments
and should be ignored. Blank lines and any spaces around fields should 
also be ignored.

The order data file must be not be modified in an editor and should 
be processed in the form provided.

The solution should be scalable and not make any assumptions about the size of
the data file or data records.

Approach the task as one where the code would have longevity and may be
maintained by other developers rather than a throwaway program where good
design does not necessarily matter. Also consider that the application may
be used in a hostile environment (i.e. the public internet) where input
may not be what you expect.


The Aim
-------

Read data from the file `orderdata` and produce a report showing the
email address, number of orders and total order value for each domain
(i.e. the part of the email address after the `@`). The report should be printed
in ascending alphabetical order of domain, i.e. `able.com`, `bodge.com`, 
`gmx.net` etc., and for each domain, the order details should be listed in 
ascending alphabetical order of the email address.

Output (but using HTML elements & tables) should appear similar to:

    +-----------------------------------------------+
    |                     bodge.com                 |
    +---------------+------------------+------------+
    | baz@bodge.com |         3        |     132.20 |
    +---------------+------------------+------------+
    |                     able.com                  |
    +---------------+------------------+------------+
    | bar@able.com  |         1        |      20.30 |
    | fo@able.com   |         4        |       5.05 |
    +---------------+------------------+------------+


The domain name should be centered and span all 3 rows. The email address
should be left aligned. The number of orders should be centered. The order 
total should be right aligned.


Implementation Approaches
-------------------------

The task may be solved either as a PHP only solution or, preferably, with a
combination of PHP and JavaScript to demonstrate and showcase knowledge
of both technologies.

For either approach, follow good OO design principles, create any
appropriate classes where necessary as well as using features already
available in the language or popular libraries so as not to reinvent
the wheel.


### PHP only Solution

Produce a webpage that has a form with a submit button and input text box
where the user can enter a partial domain name. Once submitted, the
page should display those domains containing the text supplied. If the
domain is empty, display output for all domains.


### PHP and JavaScript Solution

This solution is more representative of a modern web application, using
JavaScript to make an Ajax request to the PHP backend to receive the
raw data in JSON rather than HTML, and then to update the webpage (DOM)
using JavaScript.

Write a PHP page that with the initial page load displays a form with a
text box and submit button as for the PHP only solution, also including
or loading the relevant JavaScript.

When pressed, the submit button would trigger an Ajax request to a second
page on the backend, and once the response is received, the DOM should
be modified to show the results, formatted as described above.

If the submit button is pressed again, the results would be cleared and
updated when the new response is received. If the text field is empty,
data for all domains should be returned and displayed.

Use any relevant libraries to help such as JQuery and lodash, or a
framework such as AngularJS or React.
