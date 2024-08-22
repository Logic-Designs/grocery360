# ![Laravel Example App](public/images/main//logo.png)

# Description

  Admin panel for logic design Company

## resources

- [Database table](https://gitmind.com/app/docs/fdc9x4ue)

- [panel docs(tabler.io)](https://preview.tabler.io/) - plz go to docs when you want to create any thing new 🙏.
# Getting started

## Installation

Clone the repository

    git clone https://github.com/Logic-Designs/admin.git

Switch to the repo folder

    mv admin your_new_directory_name
    cd your_new_directory_name

Install all the dependencies using composer

    composer install

- note*: in cpanel composer didn't work very well, so install it localy then put project in cpanel.

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Logic-Designs/admin.git
    mv admin your_new_directory_name
    cd your_new_directory_name
    cp .env.example .env
    php artisan key:generate
    
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, posts, comments, images, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    

# Code overview

## Dependencies

- php 8.1
- laravel 9

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Middleware` - Contains the auth middleware
- `app/Http/Requests` - Contains all the form requests
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the routes defined in admin.php and web.php files
- `tests` - Contains all the application tests (soon) بس ادعي وقل يارب
## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
# Panel overview

## login
You can login in admin panel with route

    http://127.0.0.1:8000/admin/login
    or
    http://<your-domain>/admin/login

Default credentials

    email: admin@gmail.com
    pass: 12345678
* you can change it from AdminSeedr befor seeding

## database
سوف انتقل الي العربية لأنها اسهل في الشرح بالنسبة الي كما انها حبيبة الي قلبي 😊

 - بمجرد ان تكمل كل الخطوات اللازمة سيكون لديك tables لل admin, pages, sliders, home content, about content, cnotact content and setting.

- اعتقادي في جدول ال pages أن يتم ادخاله عن طريق المطور وليس العميل ولا يجب علي العميل ان يعدل او يضيف او يحذف اي page.

- ولكن اذا اراد ذلك يمكن بسهولة ان تذهب ال ملف route/admin.php وتجعل if(0) condation لل pages routes ب if(1).
ثم تذهب الي ملف app/http/controller/Admin/PageController وتغير المتغير can_update_pages ب 1

- بالطبع هذه الجداول مع بعض الداتا ليست ثابته لكل المواقع ولكن اخترت ما هو شائع في اكثرها 
يمكنك دائما ان تغير ما تريد ليكونمناسب للموقع

واخيراً استمتع 😇😄

## language (new)

هشرح المشكلة الأول وبعدين الحل !!

عندما يكون هناك اكثر من لغة للموقع يتم ترجمة الجمل الثابتة من ملف en.json مثلا بأستخدام @lang(" ") او __(" ")
لكن المشكلة أن المطور هو الذي يترجم هذه الكلمات ويمكن ان يخطأ او تحتاج لأكثر من تعديل من العميل
ولحل هذه المشكلة قمت بعمل مكان لتغيير القيمة لكل لغة

- بداية أذا كان الموقع يدعم اكثر من لغة يمكنك أن تحذف الشرط في ملف ال route/admin.php وكذلك الشرط في ملف ال resources/views/components/layouts/admin/menu.blade.php
وذلك سيتيح لك الأستخدام كما تريد

- ثم يمكنك التعديل علي ملف ال config/app.php ويمكنك تغيير المتغيرات ( main_language and available_language) لتناسب موقعك

- بعد ذلك للغات المضافة في (available_language) عليك عمل ملف json في resources/views/lang/lang.json لها لكي لا يظهر اخطاء

- بس كدا

## dynamic language
لو الموقع يدعم لغتين فقط
عندما نريد أن ندخل اللغة عربي وأنجليزي مثلا أو أي لغة أخرى من رأيي يمكننا ببساطة فعل ما يلي
بإفتراض اللغات (عربي و أنجليزي)
- جعل المتغير (variable) مثل name_ar و name_en
- ندخل المتغيرات من لوحة التحكم
- نعمل appends في ال model للمتغيرات بدون اللغة (في حالتنا هذه name)
- نستخدم في ال front ما وضعناه في ال appends عندما نريده مثل (هنا سيكون moadel->name)
- لا ننسى وضع ال trait في ال model واستخدام دالة ليعرف لنا الموجود في ال appends

مثال

```
<?php

namespace App\Models;

use App\Traits\LanguageFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoadelName extends Model
{
    use HasFactory, LanguageFieldsTrait;

    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    protected $appends = ['name'];

    public function getAttribute($key)
    {
        if (in_array($key, $this->appends)) {
            return $this->getLanguageFields($key);
        }

        return parent::getAttribute($key);
    }
}

```

لو الموقع يدعم أكثر من لغتين
- نعمل جدول أخر يكون modelNameTranslate
- يكون فيه ال id, lang, name
- نستخدم نفس ال trait ولكن مع التعديل ليناسب المطلوب

## admin language
you can go to 
    
    http://127.0.0.1:8000/admin/admin_language

to change admin language dynamicaly
and use in admin 
@lang('admin.key')
__('admin.key')

- بس كدا
