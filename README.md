mathsheets
==========

A variety of PHP based math practice sheets for K-5+  See README for some usage examples and demo hosted URLs.

background
==========

I started with operationSheet to help my daughters practice timed tests at home.  I added sudokuTable and numberWords when my older daughter hit Fifth Grade.

There is no pretty UI built in at the moment that allows you to control options since I originally made these for use at home.  Now that Im releasing these out on GitHub, there are plans to add some, but only as I have time.

Currently, each file has options that can be controlled by querystring variables defined below in a section for each file.  The variable names are not consistent either, but bear with me as I true all that out.

*NOTE*  There ARE bugs.  There have to be.  I have only been adding functionality as needed and have not had time to do ANY testing yet.  Remember, the original intent was for my sole use at home for my kids.  Be nice please... ;)

operationSheet
==============

base demo URL: http://blueneedle.com/printables/operationSheets.php?

## Variables

### mathtype
Defines the operation that will be displayed

* plusminus - a mix of addition and subtraction together
* divide - division
* times - multiplication
* minus - subtraction
* default - addition

### layout
Defines the layout that will be used to present the sheets

* mixed - vertical and horizontal
* portrait - vertical
* vertical - vertical
* default - landscape/horizontal

### mintop and minbot
Defines the minimum number for the top and bottom respectively

### maxtop and maxbot
Defines the maximum number for the top and bottom respectively


### Idiosycrancies
* When using layout=divide, the code normalizes the numerator so that there is no remainder.  No option exists at the moment for remainder based division.


## Example URLS
* Divided by from 0 - 12 : http://blueneedle.com/printables/operationSheets.php?mathtype=divide&layout=mixed&maxtop=12&mintop=0&minbot=0&maxbot=12
* 6/7 Addition Tables to 10: http://blueneedle.com/printables/operationSheets.php?mathtype=plus&layout=mixed&maxtop=10&mintop=0&minbot=6&maxbot=7
* 