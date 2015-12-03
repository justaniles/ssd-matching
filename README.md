# SSD MATCHING

HCI Capstone project that will allow the VT SSD department to match SSD students with note takers more efficiently.

**NOTE:** The following compilation instructions assume that you are running a Linux or OSX system.

## Dependencies
In order to build the Results Page, ensure the following dependencies are installed on your system.
#### npm
Install from the [NodeJS Website](https://nodejs.org)
#### grunt
```shell
npm install -g grunt
```
#### bower
```shell
npm install -g bower
```

## Building the application
Navigate to the root directory of the project and run the buildAll shell script:
```shell
./buildAll.sh
```

### Viewing the Results Page
After running ```./buildAll.sh```, the page can be viewed at results-page/dist/index.html

### Viewing the Submission Page
The page can be viewed at submission-page/index.html

### Installing the Server
1. Install LAMP-server onto site/server
2. Create Database
  a. Create MySQL database with password
  b. Create table with following command, you change the name of the 'table-name'
  c. &lt;insert table query&gt;
3. With the provided PHP files, alter password and table name at top of files to match log in information

© HCI Janx. 🖖
