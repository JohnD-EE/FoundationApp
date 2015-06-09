FoundationApp
=======================

Introduction
------------
####Common Elements
Identify the elements which are common to all modern web applications and bring them together to form a foundational core.

####Launch Pad
The core will act as a launch pad for speedily building new applications, meaning that development time is focused on bespoke functionality, rather than reinventing the wheel.

####Modular, minimal dependencies: 
Each core element can be turned on or off without impacting the the others.  An element could be swapped out and replaced by another element if needed.

Platform
------------
Zend Framework 2 will be used as the MVC Framework


Elements
------------
The following elements will be considered:

###Essential Elements


| Element        | Description           | Plan  |
| ------------- |:-------------:| -----:|
| User      | User Sign-Up, Authentication and Login | Use ZfcUser with GoalioForgotPassword |
| RBAC      | Role Based Access Control - Create user roles with differing security and access levels     | Consider ZfcRbac or BjyAuthorize |
| Notifications | Automated Notifications / Queuing etc.  | Research |
| Admin Control Panel | Admin Login | Bespoke Build |


###Optional Elements


| Element        | Description           | Plan  |
| ------------- |:-------------:| -----:|
| CMS      | *** | Review GotCms and libra cms |
| Oauth      | Enable Logins and access via 3rd party social media | Consider zf-oauth2 |
| Private Messaging | Encrypted Messaging Between Users | Review the project at https://github.com/stijnhau/PrivateMessaging |
| User Content Creation | *** | *** |
| User Commenting | *** | *** |

