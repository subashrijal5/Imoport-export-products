# NITV

---

## Installation steps

#### **Note**: Before starting installation make sure that you are using below mentioned php & mysql version:

```
php=7.+
mysql=5.x to upto 8
```

-   clone from repository
-   copy appropriate .env
-   For local server, run below command:

```
for linux:
sudo cp .env.example .env
for windows/mac
cp .env.example .env
```
-   after copying run below command

```
composer install
```

-   run migration and seed using below command

```
php artisan migrate --seed
```
-   To compile css and js libraries used, run following command

```
npm i
npm run dev
```
## External Libraries used

```
-  maatwebsite/excel is used for the export the db in excel formats such as .xlxs, .csv read more at 
-- https://docs.laravel-excel.com/3.1/getting-started/

- yoeunes/toastr is used for the toster, Documentation link
-- https://github.com/yoeunes/toastr
```
## Insruction for extending the application

```
-  Repository design pattern is followed
-  For the crud operations, baserepository and baseController class are already there, and some basic methods, such as      create, update, find, destroy, restore etc. If this doesn't work for you you can simply override the existing method. on respected repository or controller  
- For the export purpose, CommonExport is available, please check the respective class for the use and the laravel-excel documentation mentioned above 
- Please extend AppBaseController class instead of default baseController to use some additional methods, please check it out there.  
- Note** On creating model, make sure, you create model in following app/Models/SomeModel.php 


```

# Happy Coding :)
  
