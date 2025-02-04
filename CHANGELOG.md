This document's format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [9.6.7] - 2022-09-21
### Added
- UIStateColors: added color "orange ultra light"


## [9.6.6] - 2022-09-14
### Added
- Node: added adminPage node help in the top right corner of the adminPage box 


## [9.6.5] - 2022-09-13
### Added
- Node: added bookmarkLink, legend and filter buttons in the box.tpl

### Changed
- NestedBoolAttribute: support for search field


## [9.6.4] - 2022-09-12
### Added
- NestedBoolAttribute: support for search field (WIP)


## [9.6.3] - 2022-09-09
### Added
- Attribute: added NestedDateTimeAttribute


## [9.6.2] - 2022-09-08
### Added
- CkAttribute: added support to enterMode

### Changed
- Attribute: moved minWidth, maxHeight and maxChars from TextAttribute to Attribute

### Fixed
- MultiListAttribute: fixed fluent setters


## [9.6.1] - 2022-09-01
### Added
- Node: added hidePageTitle flag to hide title of the page

### Changed:
- Icon: update system atk icon to support fontawesome v6


## [9.6.0] - 2022-08-23
### Added
- Attribute: added UIStateColorListAttribute

### Changed
- Node: refactor template in confirmAction with multiple records


## [9.5.2] - 2022-07-28
### Changed
- Node: added argument $atkSelectors of checkConfirmAction to manage multiple atkselector


## [9.5.1] - 2022-07-28
### Added
- UIStateColors: added blue color

### Changed:
- adminPage: added admin-header class instead of list-header

### Fixed
- Legend: fix trad


## [9.5.0] - 2022-07-27
### Added
- UIStateColors: added new colors green, cyan, red, yellow, orange in light or strong version
- Tools: added new string functions strStartsWith and strEndsWith
- Node: added support to legend in the adminHeader
- NestedAttribute: added function setForceUpdate setting same value to the relative nested attribute field
- adminHeader: added adminHeaderFilterButtons to manage filter buttons in adminHeader

### Fix
- IndexPage: fix user link (top right) for administrator
- JsonAttribure: fix update when readonly and force update enabled


## [9.4.0] - 2022-07-07
### Added
- Node: added function getAtkError
- Node: added function updateDbIncludes
- Node: added function addAttributesFlags
- Node: added function removeAttributesFlags
- Node: added function hasAction
- Attribute: added TitleAttribute
- FileAttribute: added thumbnail class attribute
- UpdatedByAttribute: added possibility to force created_by user to administrator
- IndexPage: added function getPage
- IndexPage: added function getUi
- Attribute: added ListBoolAttribute
- CkAttribute: added enter mode constant (ENTER_MODE_P, ENTER_MODE_BR, ENTER_MODE_DIV)

### Changed
- Node: refactor function signatures
- Attribute: renamed variable $rec to $record
- FileAttribute: renamed function AddSlash to addSlash
- CkAttribute: changed default display mode to MODE_SCROLL

### Fix
- Attribute: refactor ButtonAttribute


## [9.3] - 2022
Contains mainly bugfixes and small changes. 


## [9.2] - 2021
This branch starts from v9.1 and it contains an updated style based on AdminLte framework. 
We are making other changes that will be rolled out in the future, generally we will be work 
on fixing existing functionalities on the version 9 line.


## [9.1] - 2018
Removed all custom javascript and added JQuery. 