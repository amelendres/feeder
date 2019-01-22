# Feed Importer (Video)

We buy videos from several sources.  Each source provides its content to us in a different format.
Write a command line script to import the videos.    


**Layers - Class Diagram**
![Layers - Class Diagram](doc/uml/Feed-Importer_Layers_Class-Diagram.jpeg#thumbnail)


**Import Videos - Sequence Diagram**
![Import Videos - Sequence Diagram](doc/uml/Feed-Importer_Import-Videos_Sequence-Diagram.jpeg)


### Installation

`composer install`


### How to run:

**Import**

`bin/import glorf`


**Tests**

`./vendor/bin/codecept run`


### Where to find the code

Go to `src` directory 


### TODO Improvements

* Save the videos through Queue-Worker depending on demand
* Add Domain Value Objects: VideoId, Url, Tag ...
