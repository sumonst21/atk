# ATK Framework

ATK Framework is a special purpose PHP framework targeted at business applications.

It's targeted at developers who wish to focus on business logic, instead of coding HTML. 
Where other application frameworks mainly provide a large set of utility classes, ATK provides a complete 
framework that requires only small amounts of code to get usable applications, while maintaining full flexibility.


## Branches

ATK was originally developed by Ivo Jansch and iBuildings back in 2000. 
It's been actively developed until 2011 (version 6.6).

This repo is managed by Sintattica. We still have some active projects based on 
various versions of ATK. Since we didn't find a true alternative to ATK yet, we opted to keep it alive.

We currently have these branches:

* main
* master (deprecated)
* 9.2
* 9.1
* 9.0
* 8.2

### main
The main branch contains the latest updates. It starts from v9.2 that was the branch that contained the rolling-releases

### master (deprecated)
This branch is deprecated and is going to be deleted at the end of 2022. Please checkout main (contains breaking changes with respect to master).

### 9.2
This branch starts from v9.1, it contains an updated style based on AdminLte framework.
We are making other changes that will be rolled out in the future, generally we will be work on fixing existing functionalities on the version 9 line.

Our primary objective in the version 9.x is to give a new layout to existing projects and update them at least to PHP7.2.

The second objective is to merge the layout updates of the 9.2.x versions with the changes made in the v10.x and put a base for the upcoming v11 of the ATK framework.

The third objective is to create a skeleton project and some documentation so everyone can get onboard and develop awesome ATK applications.


### 9.1
Version like 9.0, but with jQuery only
Currently there's no documentation for v.9. Maybe we'll manage to write some docs in the future. If you have one, please tell us.


### 9.0
This is a deeply refactored version that's not backward compatible. It's been developed with the following objectives:

* composer support and PSR-4 compatibility
* a modern class system (PSR-1/PSR-2)
* PHP7 compatibility
* better handling of modules
* removal of deprecated functions
* no more themes, GUI is now Bootstrap-based
* [Smarty 3](http://www.smarty.net/v3_overview) integration
* [Select2](https://select2.github.io/) integration


### 8.2
The fine folks at iBuildings were kind enough to transfer the atk-framework.com domain to Sintattica and to give us the sources of two historically valuable resources for ATK: the [forum](http://atk-framework.com/forum/) and the [wiki](http://atk-framework.com/wiki/).

We call this the "classic" ATK, i.e. the closest to iBuildings' version. It's largely backward compatible, with no additional functions:

* lots of bug fixes
* added a Bootstrap theme
* improvements to Steelblue/Stillblue themes
* improvements to attributes (atkAttribute, atkDateAttribute, atkListAttribute, atkNumberAttribute, atkFieldSet...)
* improvements to relations (especially atkManyToOneRelation)
* improvements to search functionality
* better handling of dependencies
* better handling of form buttons and submit
* refactoring of meta fetching
* added a couple of utility functions


## Contributions

Since we use both branches in production projects, pull requests for bug fixes are welcome, but we cannot guarantee to accept new features. Please get in touch before submitting such requests.

We kindly ask you to:

- Make pull requests by creating a feature branch from 8.2 or 9.0 or main
- Don't branch from master
- Avoid redundant comments
- Keep PSR-4 formatting
- Make the PR's topic "tight", don't modify dozens of classes or the whole app
- Only add or fix a well-defined feature, keeping your changes small



<br>
<br>

Thanks!

Team Sintattica
